<?php 
	require_once '../partials/layout.php'; 

function get_page_content() { 

	if(isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role_id'] == 1) {
?>
		<div class="content">
			<?php require_once '../partials/header.php'; ?>

				<div class="container">
					<div class="row">
						<a href="./additem.php" class="btn btn-primary">Add New Item</a>
			
					<?php 
					require '../controllers/connect.php';

					$sql = "SELECT * FROM items";
					$items = mysqli_query($conn, $sql);
					
					echo "<div class='row'>";
					foreach ($items as $item) { ?>
						<div class="col s12 m6 l4">
							<div class="card">
								<div class="card-image">
									<img src="<?php echo $item['img_path'] ?>">
								</div>
								<div class="card-content">
									<span class="card-title"><?php echo $item['name'] ?></span>
									<p><?php echo $item['description']; ?></p>
									<br>
									<h6 class="black-text">Price: ₱<?php echo $item['price']; ?></h6>
								</div>
								<div class="card-action">
									<div class="row">
										<div class="input-field col s12">
											<a href="./edititem.php?id=<?php echo $item['id']; ?>" class="btn btn-primary"> Edit Item</a>
											<a href="../controllers/deleteItem.php?id=<?php echo $item['id']; ?>" class="btn btn-danger"> Delete Item</a>

										</div>
									</div>		
								</div>
							</div>
						</div>
					<?php }; ?>
					</div> <!-- end of row -->
				</div><!--  end container -->






			
		</div>

<?php 
		require_once '../partials/footer.php';
	}	else {

		header('Location: ./error.php');
	}

} 

?>





