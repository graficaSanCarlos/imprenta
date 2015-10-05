<?php

if (!defined("SQLI_HELPER_F")) include("../../utils/sqliHelper.php");
if (!defined("API_HELPER_F")) include("../../utils/apiHelper.php");
if (!defined("USER_DAO_F")) include("../../DAOs/UserDao.php");

session_start();

if (!empty($_SESSION["user"])) {
    $users = UserDao::getAllUsers();
} else {
    $users = null;
}

if ($users) {
    echo response(0, $users);
} else {
    echo response(1, array('message'=>'noUsers'));
}

?>
