<?php

class AuthService
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function login($email, $password)
    {
        $user = $this->UserService->find_by_email($email);

        if (!$user || !$user->enabled) {
            throw new Error();
        }

        
    }

    public function logout()
    {
    }

    public function register()
    {
    }

    public function reset_password()
    {
    }

    public function verify_email()
    {
    }
}
