<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'interfaces/Sedder_Interface.php';

class Roles_Sedder implements Sedder_Interface
{
    protected $CI;
    protected $faker;
    protected $table;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->faker = Faker\Factory::create();

        $this->table = "roles";
    }

    public function sedder($total = 1)
    {
        $data = array();

        $this->CI->db->query("SET FOREIGN_KEY_CHECKS = 0;");
        $this->CI->db->truncate($this->table);
        $this->CI->db->query("SET FOREIGN_KEY_CHECKS = 1;");

        $this->CI->db->insert($this->table, array(
            "name" => "Administrador",
            "slug" => "Admin",
            "description" => "Administrador del Sistema",
            "enabled" => SI,
            "createdAt" => date("Y-m-d H:i:s")
        ));

        $this->CI->db->insert($this->table, array(
            "name" => "Invitado",
            "slug" => "invitado",
            "description" => "Invitado del Sistema",
            "enabled" => SI,
            "createdAt" => date("Y-m-d H:i:s")
        ));

        for ($i = 0; $i < $total; $i++) {
            $role =  "role_" . $this->faker->uuid();

            $data[] = array(
                "name" => $role,
                "slug" => $role,
                "description" => $this->faker->text(),
                "enabled" => $this->faker->numberBetween(0, 1),
                "createdAt" => $this->faker->date()
            );
        }

        $this->CI->db->insert_batch($this->table, $data);
    }
}

/* End of file Roles_Sedder.php */
