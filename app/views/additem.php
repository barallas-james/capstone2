<?php 
require_once '../partials/layout.php'; 

function get_page_content() {

	if(isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role_id'] == 1) {
		?>
		<div class="content">
			<?php require_once '../partials/header.php'; ?>

			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2">
						<form action="../controllers/processAddItem.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" name="name" id="name" required>
							</div>
							<div class="form-group">
								<label for="price">Price:</label>
								<input type="text" class="form-control" min="1" name="price" id="price" required>
							</div>
							<div class="form-group">
								<label for="description">Description:</label>
								<textarea type="text" class="form-control col-8" rows="5" name="description" id="description"></textarea>
							</div>
							<div class="select-wrapper">
								<label for="categories">Category:</label>
								<select class="form-control col-8" name="category_id" id="categories" required>

									<?php

									require_once '../controllers/connect.php'; 

									$sql = "SELECT * FROM categories";
									$categories = mysqli_query($conn, $sql);
									foreach($categories as $category) {
											//extract is another way of getting data. it transforms the columns into variables
										extract($category);
										echo "<option value='$id'>$name</option> ";
									}
									mysqli_close($conn);
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="image">Image:</label>
								<input type="file" id="image" class="form-control" name="image" required>
							</div>
							<button type="submit" class="btn btn-block-primary">Add New Item</button>
						</form> <!-- end form -->
					</div> <!-- end 8 cols -->
				</div> <!-- end row -->
			</div> <!-- end container -->
		</div>
<?php 
		require_once '../partials/footer.php';
	}	else {

		header('Location: ./error.php');
	}

}; 
?>

