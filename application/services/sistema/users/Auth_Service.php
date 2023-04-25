<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Service
{
    protected $CI;
    protected $User_Repository_Service;
    protected $ForgotPassword_Email;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->service("sistema/users/User_Repository_Service");
        $this->CI->load->service("emails/ForgotPassword_Email");
        $this->CI->load->model("sistema/User_model");

        $this->User_Repository_Service = new User_Repository_Service();
        $this->ForgotPassword_Email = new ForgotPassword_Email();
    }

    public function login(string $email, string $password) 
    {
        $user = $this->User_Repository_Service->find_by_email($email);

        if(!$user) {
            throw new Exception(lang("users_error_user_not_found"));
        }

        $is_password_match = $this->CI->security->verify_password($password, $user->password);

        if($is_password_match === false) {
            throw new Exception(lang("users_error_incorrect_email_and_or_password"));
        }

        return $user;
    }

    public function logout() 
    {
        $this->CI->session_destroy();
    }

    public function forgot_password(string $email) 
    {
        $user = $this->User_Repository_Service->find_by_email($email);

        if (!$user || !$user->enabled) {
            throw new Exception(lang("users_error_user_not_found"));
        }        

        $this->ForgotPassword_Email->send($user);
    }
}
