<?php
session_start();
require_once(__DIR__ . '/../../utilities/DBConn.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/libs/helpers.php');
require_once(__DIR__ . '/libs/flash.php');
require_once(__DIR__ . '/libs/sanitization.php');
require_once(__DIR__ . '/libs/validation.php');
require_once(__DIR__ . '/libs/filter.php');
require_once(__DIR__ . '/RememberMeService.php');
class AuthService
{
    var $dbConn;
    public function __construct()
    {
        $this->dbConn = new DBConn();
    }
    function register_user(string $email, string $username, string $password, bool $is_admin = false): bool
    {
        $new_user = new User($username, $email, $password, $is_admin);

        $sql = 'INSERT INTO user(username, email, password, is_admin)
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
        FROM user
        WHERE username=?';

        $stmt = $this->dbConn->conn->prepare($sql);
        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    function log_user_in(array $user): bool
{
    // prevent session fixation attack
    if (session_regenerate_id()) {
        // set username & id in the session
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        return true;
    }

    return false;
}


    function login(string $username, string $password, bool $remember = false): bool
    {
        $authService = new AuthService();
        $rememberMeService = new RememberMeService();
        $user = $authService->find_user_by_username($username);

        // if user found, check the password
        if ($user  && password_verify($password, $user['password'])) {

            $this->log_user_in($user);
    
            if ($remember) {
                $rememberMeService->remember_me($user['id']);
            }
    
            return true;
        }

        return false;
    }
    function is_user_logged_in(): bool
    {
        $rememberMeService = new RememberMeService();

        if (isset($_SESSION['username'])) {
            return true;
        }
    
        // check the remember_me in cookie
        $token = filter_input(INPUT_COOKIE, 'remember_me', FILTER_UNSAFE_RAW);
    
        if ($token && $rememberMeService->token_is_valid($token)) {
    
            $user = $rememberMeService->find_user_by_token($token);
    
            if ($user) {
                return $this->log_user_in($user);
            }
        }
        return false;
    }
    function require_login(): void
    {
        $authService = new AuthService();
        if (!$authService->is_user_logged_in()) {
            redirect_to('/../../PHP_Miniproject/views/auth/login.php');
        }
    }
    function current_user()
    {
        $authService = new AuthService();
        if ($authService->is_user_logged_in()) {
            // return $_SESSION['username'];
            return json_encode($_SESSION);
        }
        return null;
    }
    function logout(): void
    {
        $rememberMeService = new RememberMeService();
        if ($this->is_user_logged_in()) {

            // delete the user token
            $rememberMeService->delete_user_token($_SESSION['user_id']);

            // delete session
            unset($_SESSION['username'], $_SESSION['user_id`']);

            // remove the remember_me cookie
            if (isset($_COOKIE['remember_me'])) {
                unset($_COOKIE['remember_me']);
                setcookie('remember_user', null, -1);
            }

            // remove all session data
            session_destroy();

            redirect_to('/../../PHP_Miniproject');
        }
    }
}
