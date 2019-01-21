<?php
	session_start();
	include_once './connect.php';

	$id = $_GET['id'];

	$sql = "DELETE from items WHERE id = $id";
	$res = mysqli_query($conn, $sql);

	$res ? header('Location: ../views/item.php') : mysqli_error($conn);

?>