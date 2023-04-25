<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'interfaces/Sedder_Interface.php';

class Users_Sedder implements Sedder_Interface
{
    protected $CI;
    protected $faker;
    protected $table;

    protected $User_Repository_Service;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->faker = Faker\Factory::create();

        $this->CI->load->dto('sistema/User_Dto');
        $this->CI->load->service("sistema/users/User_Repository_Service");        

        $this->User_Repository_Service = new User_Repository_Service();

        $this->table = "users";
    }

    public function sedder($total = 1)
    {
        $this->CI->db->query("SET FOREIGN_KEY_CHECKS = 0;");
        $this->CI->db->truncate($this->table);
        $this->CI->db->query("SET FOREIGN_KEY_CHECKS = 1;");

        $user_dto = new User_Dto();

        $user_dto->name = "Guss";
        $user_dto->surname = "Avila Medina";
        $user_dto->username = "Admin";
        $user_dto->avatar = NULL;
        $user_dto->email = "gussware@gmail.com";
        $user_dto->password = "123qweAA";
        $user_dto->idRole = 1;
        $user_dto->isEmailVerified = 1;
        $user_dto->enabled = 1;

        $this->User_Repository_Service->create($user_dto);
    }
}

/* End of file Roles_Sedder.php */
