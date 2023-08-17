<?php

require_once __DIR__ . '/../services/auth/AuthService.php';

class AuthController{
    private $authService;

    function __construct(){
        $this->authService = new AuthService();
    }

    function is_user_logged_in():bool{
        return $this->authService->is_user_logged_in();
    }

    function require_login():void{
        $this->authService->require_login();
    }
    function current_user(){
        return $this->authService->current_user();
    }
}