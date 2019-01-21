<?php 
	require_once '../partials/layout.php'; 

	function get_page_content() { 
		if(!isset($_SESSION['logged_in_user']) || $_SESSION['logged_in_user']['role_id'] == 2  ) {
?>
		<div class="content">
			<?php require_once '../partials/header.php'; ?>

			<?php
				$polos = "";
				$pants = "";
				$shoes = "";

				if (isset($_GET['category'])) {
					if ($_GET['category'] == 'polos') {
						$polos = 'active';
					}
					if ($_GET['category'] == 'pants') {
						$pants = 'active';
					}
					if ($_GET['category'] == 'shoes') {
						$shoes = 'active';
					}
				}
			?>


			<div class="container mt25">

				<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
					<li class="tab"><a class="<?php echo $polos ?>" href="#polos">Polos</a></li>
					<li class="tab"><a class="<?php echo $pants ?>" href="#pants">Pants</a></li>
					<li class="tab"><a class="<?php echo $shoes ?>" href="#shoes">Shoes</a></li>
				</ul>
				<div id="polos" class="col s12">
					<h3>Polos</h3>

					<div class="row">
						<?php 
						require '../controllers/connect.php';

						$sql = "SELECT * FROM items WHERE category_id = 2";

						$result = mysqli_query($conn,$sql);

						while($row = mysqli_fetch_assoc($result)){
						?>

						<div class="col s12 m6 l4">
							<div class="card">
								<div class="card-image">
									<img src="<?php echo $row['img_path'] ?>">
								</div>
								<div class="card-content">
									<span class="card-title"><?php echo $row['name'] ?></span>
									<p><?php echo $row['description']; ?></p>
									<br>
									<h6 class="black-text">Price: ₱<?php echo $row['price']; ?></h6>
								</div>
								<div class="card-action">
									<div class="row">
										<div class="input-field col s12">
											<input type="number" class="form-control" value="1">
											<button type="submit" class="btn add-to-cart" data-id="<?php echo $row['id']; ?>"> Add to cart</button>
										</div>
									</div>		
								</div>
							</div>
						</div>

						<?php 
						}
						?>

					</div>
						
				</div>

				<div id="pants" class="col s12">
					<h3>Pants</h3>

					<div class="row">
						<?php 
						require '../controllers/connect.php';

						$sql = "SELECT * FROM items WHERE category_id = 1";

						$result = mysqli_query($conn,$sql);

						while($row = mysqli_fetch_assoc($result)){
						?>

						<div class="col s12 m6 l4">
							<div class="card">
								<div class="card-image">
									<img src="<?php echo $row['img_path'] ?>">
								</div>
								<div class="card-content">
									<span class="card-title"><?php echo $row['name'] ?></span>
									<p><?php echo $row['description']; ?></p>
									<br>
									<h6 class="black-text">Price: ₱<?php echo $row['price']; ?></h6>
								</div>
								<div class="card-action">
									<div class="row">
										<div class="input-field col s12">
											<input type="number" class="form-control" value="1">
											<button type="submit" class="btn add-to-cart" data-id="<?php echo $row['id']; ?>"> Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php 
						}
						?>
					</div>
				</div>
				
			

				<div id="shoes" class="col s12">
					<h3>Shoes</h3>

					<div class="row">
						<?php 
						require '../controllers/connect.php';

						$sql = "SELECT * FROM items WHERE category_id = 3";

						$result = mysqli_query($conn,$sql);

						while($row = mysqli_fetch_assoc($result)){
						?>

						<div class="col s12 m6 l4">
							<div class="card">
								<div class="card-image">
									<img src="<?php echo $row['img_path'] ?>">
								</div>
								<div class="card-content">
									<span class="card-title"><?php echo $row['name'] ?></span>
									<p><?php echo $row['description']; ?></p>
									<br>
									<h6 class="black-text">Price: ₱<?php echo $row['price']; ?></h6>
								</div>
								<div class="card-action">
									<div class="row">
										<div class="input-field col s12">
											<input type="number" class="" value="1">
											<button type="submit" class="btn add-to-cart" data-id="<?php echo $row['id']; ?>"> Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php 
						}
						?>
					</div>
				</div>

			</div>

	</div>
	
<?php 
		require_once '../partials/footer.php';
		} else {

		header('Location: ./error.php');
		}
	}; 
?>
