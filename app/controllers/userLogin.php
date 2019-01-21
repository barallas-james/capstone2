<?php 
	session_start();
	require_once './connect.php';

	$loginUser = $_POST['loginUser'];
	$loginPass = $_POST['loginPass'];

	
	$sql = "SELECT * FROM users WHERE uName ='$loginUser' ";
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);

	if(password_verify($loginPass, $row['password'])){
		$_SESSION['logged_in_user'] = $row;
		echo "login_success";


	} else {
		$_SESSION['error_message'] = "Login Failed";
		echo "login_failed";
	}
	
		mysqli_close($conn);
 ?>