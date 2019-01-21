<?php 

// $host = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'e-com';

$host = "db4free.net";
$username = "barallas_ecom";
$password = "James4523";
$dbname = "ecom_capstone2";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('Connection Failed');
}

// echo "Connection Succesfully";

?>