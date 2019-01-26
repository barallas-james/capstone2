	<?php require_once '../partials/layout.php'; 


function get_page_content() { 
	if(!isset($_SESSION['logged_in_user']) || $_SESSION['logged_in_user']['role_id'] == 2  ) {

	?>
	<div class="content">
			<?php require_once '../partials/header.php'; ?>

	<div class="container">

			<h1>Thank you for choosing Soots Store.</h1>
			<h3>Your confirmation number is: <?php echo $_SESSION['new_txn_number'];?></h3>

			<a href="catalog.php" class="btn">Continue Shopping</a>
	</div> <!-- end container -->

</div>
<?php 
	require_once '../partials/footer.php';
} else {

		header('Location: ./error.php');
	}

}

?>
