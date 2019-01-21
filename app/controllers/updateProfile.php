<?php

	require './connect.php';

	session_start();

	$userId = $_POST['user_id'];
	$fName = $_POST['firstname'];
	$lName = $_POST['lastname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	
	$sqlupdate = "UPDATE users SET  fName = '$fName', lName = '$lName', email = '$email', address = '$address' WHERE id = $userId";
	$result1 = mysqli_query($conn, $sqlupdate);


	//to return the updated data from the users table
	$sqlshow = "SELECT * FROM users WHERE id ='$userId'";
	$result2 = mysqli_query($conn, $sqlshow);

	$_SESSION['logged_in_user'] = mysqli_fetch_assoc($result2);

	header('Location: ../views/profile.php');


?>