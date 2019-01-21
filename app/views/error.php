<?php 
	require_once '../partials/layout.php'; 

	function get_page_content() { 
?>
		<div class="content">
			<?php require_once '../partials/header.php'; ?>

			<div class="container">
				<h1>I'm sorry, this page is off limits.</h1>

				<p class="mb25">Please return to home page to continue your normal browsing</p>

				<a href="index.php" class="btn">Click here to redirect to home</a>
			</div>

			
		</div>
	
<?php 
		require_once '../partials/footer.php';
	}; 
?>

