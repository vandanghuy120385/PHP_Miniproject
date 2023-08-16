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
function register_user(string $email, string $username, string $password, bool $is_admin = false): bool
{


    $sql = 'INSERT INTO users(username, email, password, is_admin)
        VALUES(?, ?, ?, ?)';

    $stmt = db()->prepare($sql);

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $is_admin_int = (int)$is_admin;

    $stmt->bind_param("sssi", $username, $email, $hashed_password, $is_admin_int);

    return $stmt->execute();
}

function find_user_by_username(string $username)
{
    $sql = 'SELECT id, username, password
        FROM users
        WHERE username=?';

    $stmt = db()->prepare($sql);
    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function login(string $username, string $password): bool
{
    $user = find_user_by_username($username);

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
    if (!is_user_logged_in()) {
        redirect_to('login.php');
    }
}
function current_user()
{
    if (is_user_logged_in()) {
        return json_encode($_SESSION);
    }
    return null;
}
function logout(): void
{
    if (is_user_logged_in()) {
        unset($_SESSION['username'], $_SESSION['user_id']);
        session_destroy();
        redirect_to('login.php');
    }
}
