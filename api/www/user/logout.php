<?php

if(!defined("SQLI_HELPER_F")) include("../../utils/sqliHelper.php");
if(!defined("API_HELPER_F")) include("../../utils/apiHelper.php");

session_start();
session_unset();
session_destroy();
echo response(0, 'logged out');

?>
