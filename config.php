<?php
/**
 * Created by PhpStorm.
 * User: dengero
 * Date: 22/03/2019
 * Time: 11:46 AM
 */
define("APP_USER_CREDENTIAL_AUTH", "APP_USER_CREDENTIAL_AUTH");

class myConfiguration {
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $database = 'project_e_db';
}


$config = new myConfiguration();
return $config;