<?php 

$server = "localhost";
$username = "root";
$password = "aneesh2510";

$db = "phpajax";

$conn = new mysqli($server, $username, $password, $db);

if($conn->connect_error)
{
	die("Cannot Connect to DB, Error: " . $conn->connect_error);
}
?>