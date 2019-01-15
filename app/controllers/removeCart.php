<?php
	session_start();
	$arrayPosition = $_POST['cartId'];

	unset($_SESSION['cart'][$arrayPosition]); 

	
?>