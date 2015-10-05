<?php

if(!defined("SQLI_HELPER_F")) include("../../utils/sqliHelper.php");
if(!defined("API_HELPER_F")) include("../../utils/apiHelper.php");
if(!defined("USER_DAO_F"))include("../../DAOs/UserDao.php");

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    echo response(1, array('message'=>'userAndPasswordAreRequired'));
    return;
}

$user = UserDao::getUserByCredentials($username, $password);

if ($user) {
    session_start();
    $_SESSION["user"] = $user;
    echo response(0, $user);
} else {
    echo response(1, array('message'=>'wrongUserOrPassword'));
}

?>
