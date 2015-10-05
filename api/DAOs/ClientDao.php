<?php

define("CLIENT_DAO_F",1);

if(!defined("SQLI_HELPER_F")) include("../../utils/sqliHelper.php");
if(!defined("CLIENT_F"))include("../../models/client.php");

class ClientDao {

    static function getAllClients() {
        openSQLConnection();
        $q = 'SELECT * FROM client;';
        $rows = SQL($q);
        $clients = array();
        if (!empty($rows)) {
            foreach ($rows as $name => $value) {
                $clients[] = Client::fromJSON(json_encode($value));
            }
        }
        return $clients; // TODO change rows for clients
    }

    static function getClientsByName($name) {
        openSQLConnection();
        $q = "SELECT * FROM client WHERE name LIKE '%?%';";
        $rows = SQL($q, $name);
        $clients = [];
        if (!empty($rows)) {
            foreach ($rows as $name => $value) {
                $clients[] = Client::fromJSON(json_encode($value));
            }
        }
        return $clients;
    }

    static function getClientsById($id) {
        openSQLConnection();
        $q = "SELECT * FROM client WHERE id = ?;";
        $rows = SQL($q, $id);
        $clients = [];
        if (!empty($rows)) {
            foreach ($rows as $name => $value) {
                $clients[] = Client::fromJSON(json_encode($value));
            }
        }
        return $clients;
    }
}
