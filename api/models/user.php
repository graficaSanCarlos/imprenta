<?php

define("USER_F", 1);

if(!defined("ENTITY_F")) include("entity.php");

class User extends Entity {

    public $id;
    public $username;
    public $password;
    public $businessName;
    public $level;
    public $sector;
    public $phone;
    public $email;
    public $isActive;
}

?>
