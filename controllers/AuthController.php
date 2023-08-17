<?php
require_once(__DIR__. '/../services/auth/AuthService.php');

class AuthController{
    private $authService;

    public function __construct(){
        $this->authService = new AuthService();
    }

    public function is_user_logged_in():bool{
        return $this->authService->is_user_logged_in();
    }

    public function require_login():void{
        $this->authService->require_login();
    }
    public function current_user(){
        return $this->authService->current_user();
    }
}