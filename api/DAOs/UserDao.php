<?php

define("USER_DAO_F",1);

if(!defined("SQLI_HELPER_F")) include("../utils/sqliHelper.php");
if(!defined("USER_F"))include("../../models/user.php");

class UserDao {

    static function getUserByCredentials($username, $password) {
        openSQLConnection();
        $q = "SELECT * FROM user WHERE username = ?;";
        $rows = SQL($q, $username);
        $user = null;
        if ($rows && !empty($rows)) {
            $user = $rows[0];
            $user = $user['password'] == $_POST['password'] ? $user : null;
        }
        return $user;
    }

    static function getAllUsers() {
        openSQLConnection();
        $q = "SELECT * FROM user;";
        $rows = SQL($q);
        $users = [];
        if (!empty($rows)) {
            foreach ($rows as $name => $value) {
                $users[] = User::fromJSON(json_encode($value));
            }
        }
        return $users;
    }
}
