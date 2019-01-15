<?php 
	require './connect.php';

	$fName = $_POST['fName'];
	$lName = $_POST['lName'];
	$address = $_POST['address'];
	$telephone = $_POST['telephone'];
	$cellphone = $_POST['cellphone'];
	$email = $_POST['email'];
	$uName = $_POST['uName'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

	// retrieve only the data under the username column that
	// has the same value as the username variable
	$sql = "SELECT * FROM users WHERE username = '$username' ";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		die("user_exists");
	} else {
		$sql_insert = "INSERT INTO users(fName, lName, address, telephone, cellphone, email, uName, password) VALUES ('$fName', '$lName', '$address', '$telephone', '$cellphone', '$email', '$uName', '$password'); ";
		$result = mysqli_query($conn, $sql_insert);		
	}


	mysqli_close($conn);

 ?>