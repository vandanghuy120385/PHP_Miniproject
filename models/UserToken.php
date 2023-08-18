<?php
class UserToken
{
    private $user_id;
    private $selector;
    private $hashed_validator;
    private $expiry;

    public function __construct($user_id, $selector, $hashed_validator, $expiry)
    {
        $this->user_id = $user_id;
        $this->selector = $selector;
        $this->hashed_validator = $hashed_validator;
        $this->expiry = $expiry;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getSelector()
    {
        return $this->selector;
    }

    public function getExpiry()
    {
        return $this->expiry;
    }

    public function getHashedValidator()
    {
        return $this->hashed_validator;
    }
}
