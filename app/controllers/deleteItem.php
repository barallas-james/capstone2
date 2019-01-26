<?php
	session_start();
	include_once './connect.php';

	$id = $_GET['id'];

	$sql = "DELETE from items WHERE id = $id";

	$result = mysqli_query($conn, $sql);	

	header('Location: ../views/item.php');

?>