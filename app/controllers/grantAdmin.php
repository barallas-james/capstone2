<?php

	require './connect.php';

	session_start();

	$userId = $_GET['id'];

	$sqlupdate = "SELECT * FROM users WHERE id = $userId";
	$result1 = mysqli_query($conn, $sqlupdate);
	$user = mysqli_fetch_assoc($result1);

	if ($user['role_id'] == 2) {
		$update_role = "UPDATE users SET role_id = 1 WHERE id = $userId";
	} else{
		$update_role = "UPDATE users SET role_id = 2 WHERE id = $userId";
	}

	$result2 = mysqli_query($conn, $update_role);

	if (!$result2) {
		echo mysqli_error($conn);
	}

	header('Location: ../views/users.php');


?>