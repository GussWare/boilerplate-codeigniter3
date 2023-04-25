<?php

$config["middelwares"] = array(
    "validations" => array(
        "auth/login" => "AuthLogin_Validation",
        "auth/forgot-password" => "AuthForgot_Validation",
        "auth/register-user" => "AuthRegister_Validation",
        
        "modules/create" => "Module_Validation"
    )
);
