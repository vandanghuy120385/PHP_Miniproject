<!-- /**
* Register a user
*
* @param string $email
* @param string $username
* @param string $password
* @param bool $is_admin
* @return bool
*/ -->
<?php

require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../utilities/DBConn.php';
class AuthService
{
    var $dbConn;
    public function __construct()
    {
        $this->dbConn = new DBConn();
    }
    function register_user(string $email, string $username, string $password, bool $is_admin = false): bool
    {
        $new_user = new User($email, $username, $password, $is_admin);

        $sql = 'INSERT INTO users(username, email, password, is_admin)
        VALUES(?, ?, ?, ?)';

        $stmt = $this->dbConn->conn->prepare($sql);

        $hashed_password = password_hash($new_user->getPassword(), PASSWORD_BCRYPT);
        $is_admin_int = (int)$new_user->getIsAdmin();
        $insert_username = $new_user->getUsername();
        $insert_email = $new_user->getEmail();

        $stmt->bind_param("sssi", $insert_username, $insert_email, $hashed_password, $is_admin_int);

        return $stmt->execute();
    }

    function find_user_by_username(string $username)
    {
        $sql = 'SELECT id, username, password
        FROM users
        WHERE username=?';

        $stmt = $this->dbConn->conn->prepare($sql);
        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    function login(string $username, string $password): bool
    {
        $authService = new AuthService();
        $user = $authService->find_user_by_username($username);

        // if user found, check the password
        if ($user && password_verify($password, $user['password'])) {

            // prevent session fixation attack
            session_regenerate_id();

            // set username in the session
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id']  = $user['id'];


            return true;
        }

        return false;
    }
    function is_user_logged_in(): bool
    {
        return isset($_SESSION['username']);
    }
    function require_login(): void
    {
        $authService = new AuthService();
        if (!$authService->is_user_logged_in()) {
            redirect_to('login.php');
        }
    }
    function current_user()
    {
        $authService = new AuthService();
        if ($authService->is_user_logged_in()) {
            return json_encode($_SESSION);
        }
        return null;
    }
    function logout(): void
    {
        $authService = new AuthService();
        if ($authService->is_user_logged_in()) {
            unset($_SESSION['username'], $_SESSION['user_id']);
            session_destroy();
            redirect_to('login.php');
        }
    }
}
