<?php

define("CLIENT_F", 1);

if(!defined("ENTITY_F")) include("entity.php");

class Client extends Entity {
    public $id;
    public $creationDate;
    public $salesMan;
    public $address;
    public $postalCode;
    public $businessName;
    public $businessAddress;
    public $tangoId;
    public $cashPayment;
    public $town;
    public $cuit;
    public $phoneNumber1;
    public $phoneNumber2;
    public $ivaStatus;
    public $brand;
    public $brandSector;
    public $email;
    public $observations;
    public $contact;
    public $contactHour;
}

?>
