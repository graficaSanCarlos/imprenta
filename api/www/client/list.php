<?php

if (!defined("SQLI_HELPER_F")) include("../../utils/sqliHelper.php");
if (!defined("API_HELPER_F")) include("../../utils/apiHelper.php");
if (!defined("CLIENT_DAO_F")) include("../../DAOs/ClientDao.php");

session_start();

if (!empty($_SESSION["user"])) {
    $clients = ClientDao::getAllClients();
} else {
    $clients = null;
}

if ($clients) {
    echo response(0, $clients);
} else {
    echo response(1, array('message'=>'noClients'));
}

?>
