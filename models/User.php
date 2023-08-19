<?php
class User
{
    private $username;
    private $email;
    private $password;
    private $is_admin;
    
    function __construct($username, $email, $password, $is_admin)
	{
		$this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
	}

    function getUsername(){
        return $this->username;
    }

    function getEmail(){
        return $this->email;
    }

    function getPassword(){
        return $this->password;
    }
    function getIsAdmin(){
        return $this->is_admin;
    }
}