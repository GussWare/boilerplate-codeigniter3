<?php 

class ForgotPassword_Email {

    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();

        $this->CI->load->config('email');
        $this->CI->load->library('email');
    }

    public function send($user) 
    {
        $subject    = lang("email_forgot_password_subject");
        $message    = $this->get_message($user->email);
        $email_from = getenv('CI_SMTP_EMAIL');

        $this->CI->email->subject($subject);
        $this->CI->email->from($email_from);
        $this->CI->email->to($user->email);
        $this->CI->email->message($message);

        $response = $this->CI->email->send();

        if($response === false) {
            throw new Error($this->CI->email->print_debugger());
        }

        return $response;
    }

    protected function get_message($user)
    {
        $message = $this->CI->load->view('emails/forgot_password_view', array("user" => $user), true);

        return $message;
    }
}