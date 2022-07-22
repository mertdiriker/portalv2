<?php
$host = 'localhost';
$username = 'root';
$pass = '1234';
$db = 'burbant_database';

$db = new mysqli($host,$username,$pass,$db);

if ($db->connect_error) {
	 die("Connection Failed". $db->connect_error);
}

?>