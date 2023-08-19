<?php
require_once(__DIR__ . '/../../utilities/DBConn.php');
require_once(__DIR__ . '/../../models/UserToken.php');
require_once(__DIR__ . '/libs/helpers.php');
class RememberMeService
{
    var $DBConn;
    public function __construct()
    {

        $this->DBConn = new DBConn();
    }


    function insert_user_token(int $user_id, string $selector, string $hashed_validator, string $expiry): bool
    {
        $user_token = new UserToken($user_id, $selector, $hashed_validator, $expiry);
        $sql = "INSERT INTO UserToken(user_id, selector, hashed_validator, expiry)
            VALUES(?, ?, ?, ?)";

        $statement = $this->DBConn->conn->prepare($sql);

        $userId = $user_token->getUserId();
        $selector = $user_token->getSelector();
        $hashedValidator = $user_token->getHashedValidator();
        $expiry = $user_token->getExpiry();

        $statement->bind_param('isss', $userId, $selector, $hashedValidator, $expiry);

        return $statement->execute();
    }
    function find_user_token_by_selector(string $selector)
    {
        $sql = "SELECT id, selector, hashed_validator, user_id, expiry
            FROM UserToken
            WHERE selector = '?' AND
                expiry >= now()
            LIMIT 1";

        $statement = $this->DBConn->conn->prepare($sql);

        $statement->bind_param('s', $selector);

        $statement->execute();

        $result = $statement->get_result();
        return $result->fetch_assoc();
    }
    function delete_user_token(int $user_id): bool
    {
        $sql = "DELETE FROM UserToken WHERE user_id = ?";
        $statement = $this->DBConn->conn->prepare($sql);

        $statement->bind_param('i', $user_id);

        return $statement->execute();
    }
    function find_user_by_token(string $token)
    {
        $tokens = parse_token($token);
        echo $tokens;
        if (!$tokens) {
            return null;
        }
        
        $sql = "SELECT User.id, username
        FROM User
        INNER JOIN UserToken ON user_id = User.id
        WHERE selector = ? AND
            expiry > now()
        LIMIT 1";
        $statement = $this->DBConn->conn->prepare($sql);
        if ($statement != false) {
            $selector = $tokens[0];
            $isSuccess = $statement->bind_param('s', $selector);
            if ($isSuccess === true) {
                $statement->execute();
                $result = $statement->get_result();
                // return user_id and username
                return $result->fetch_assoc();
            }
        }
    }
    function token_is_valid(string $token): bool
    {
        [$selector, $validator] = parse_token($token);
        $tokens = $this->find_user_token_by_selector($selector);
        if (!$tokens) {
            return false;
        }

        return password_verify($validator, $tokens['hashed_validator']);
    }
    function remember_me(int $user_id, int $day = 30)
    {
        [$selector, $validator, $token] = generate_tokens();

        // remove all existing token associated with the user id
        $this->delete_user_token($user_id);

        // set expiration date
        $expired_seconds = time() + 60 * 60 * 24 * $day;

        // insert a token to the database
        $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
        $expiry = date('Y-m-d H:i:s', $expired_seconds);

        if ($this->insert_user_token($user_id, $selector, $hash_validator, $expiry)) {
            setcookie('remember_me', $token, $expired_seconds);
        }
    }
}
