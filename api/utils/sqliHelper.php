<?php

define("SQLI_HELPER_F",1);

function openSQLConnection() {
	global $DB;
	if (!defined("CONNECTION_SQLI_OPEN")){
		define("CONNECTION_SQLI_OPEN", 1);
		define("DATABASE_IP", "127.0.0.1");
		define("DATABASE_USER", "root");
		define("DATABASE_PASSWORD", "");
		define("DATABASE_NAME", "imprenta");

		$DB = new mysqli(DATABASE_IP, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
		if (mysqli_connect_errno())
   			trigger_error("Unable to connect to MySQLi database.");
		$DB->set_charset('utf8');
	}
}

function SQL($Query) {
	global $DB;
	$args = func_get_args();
	if (count($args) == 1) {
		$result = $DB->query($Query);
		if ($result->num_rows) {
			$out = array();
			while (null != ($r = $result->fetch_array(MYSQLI_ASSOC))) {
				$out [] = $r;
			}
			return $out;
		}
		return null;
	} else {
		if (!$stmt = $DB->prepare($Query))
			trigger_error("Unable to prepare statement: {$Query}, reason: " . $DB->error . "");
		array_shift($args); //remove $Query from args
		//the following three lines are the only way to copy an array values in PHP
		$a = array();
		foreach ($args as $k => &$v)
			$a[$k] = &$v;
		$types = str_repeat("s", count($args)); //all params are strings, works well on MySQL and SQLite
		array_unshift($a, $types);
		call_user_func_array(array($stmt, 'bind_param'), $a);
		$stmt->execute();
		//fetching all results in a 2D array
		$metadata = $stmt->result_metadata();
		$out = array();
		$fields = array();
		if (!$metadata)
			return null;
		$length = 0;
		while (null != ($field = mysqli_fetch_field($metadata))) {
			$fields [] = &$out [$field->name];
			$length+=$field->length;
		}
		call_user_func_array(array(
			$stmt, "bind_result"
		), $fields);
		$output = array();
		$count = 0;
		while ($stmt->fetch()) {
			foreach ($out as $k => $v)
				$output [$count] [$k] = $v;
				$count++;
		}
		$stmt->free_result();
		return $output;
	}
}

function getIdInserted() {
	global $DB;
	return mysqli_insert_id($DB);
}

?>
