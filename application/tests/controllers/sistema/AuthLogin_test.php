<?php

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class AuthLogin_test extends TestCase
{
    /**
     * @testdox Prueba de carga de la pagina principal de login
     */
    public function test_index()
    {
        $this->request('GET', 'auth');
        $this->assertResponseCode(HttpStatus::HTTP_OK);

        $this->request('GET', 'auth/index');
        $this->assertResponseCode(HttpStatus::HTTP_OK);
    }

    /**
     * @testdox Inicio de sesión exitoso con email y contraseña correctos
     */
    public function test_login()
    {
        $output = $this->request(
            'POST',
            'auth/login',
            array(
                "email" => "gussware@gmail.com",
                "password" => "123qweAA"
            )
        );

        $this->assertResponseCode(HttpStatus::HTTP_OK);
    }

    /**
     * @testdox Inicio de sesión exitoso con email y contraseña largos
     */
    public function test_login()
    {
        $output = $this->request(
            'POST',
            'auth/login',
            array(
                "email" => "gussware@gmail.com",
                "password" => "123qweAA"
            )
        );

        $this->assertResponseCode(HttpStatus::HTTP_OK);
    }
}
