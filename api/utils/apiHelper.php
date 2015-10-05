<?php

define("API_HELPER_F",1);

function response($statusCode, $data) {
	global $DB;
	if (defined("CONNECTION_SQLI_OPEN"))
		mysqli_close($DB);

    return json_encode($statusCode ? array("statusCode" => $statusCode, "data" => $data) : $data);
}


date_default_timezone_set('America/Argentina/Buenos_Aires');

?>
