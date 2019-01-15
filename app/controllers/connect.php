<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'e-com';


$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('Connection Failed');
}

// echo "Connection Succesfully";

?>