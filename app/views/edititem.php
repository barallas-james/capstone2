<?php 
	require_once '../partials/layout.php'; 

	function get_page_content() { 

		if(isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role_id'] == 1) {

			require '../controllers/connect.php';

			$itemId = $_GET['id'];

			$sql = "SELECT * FROM items WHERE id = '$itemId'";
			$result = mysqli_query($conn, $sql);
			$item = mysqli_fetch_assoc($result);
?>
			<div class="content">
				<?php require_once '../partials/header.php'; ?>

				<div class="container">
					<div class="row mt25">

						<form action="../controllers/processEditItem.php" method="POST">
							<div class="input-field col s6">
								<input placeholder="Placeholder" id="name" name="name" type="text" value="<?php echo $item['name'] ?>">
								<label for="name">Name</label>
					        </div>
					        <div class="input-field col s6">
								<input placeholder="Placeholder" id="price" name="price" type="number" value="<?php echo $item['price'] ?>">
								<label for="price">Price</label>
					        </div>
					        <div class="input-field col s12">
								<textarea id="description" name="description" class="materialize-textarea"><?php echo $item['description'] ?></textarea>
								<label for="description">Description</label>
					        </div>

					        <div class="input-field col s12">
					        	<select name="category_id" id="category_id">
					        		<option value="" disabled selected>Category</option>
					        		<?php

					        		require '../controllers/connect.php';

									$sql = "SELECT * FROM categories";
									$categories = mysqli_query($conn, $sql);
									
									foreach ($categories as $category) { 
										extract($category);

										$selected = $item['category_id'] == $id ? 'selected' : '';
										echo "<option value='$id' $selected>$name</option>";
						
						        	}
						        	?>
					        	</select>
					        	<label>Categories</label>
					        </div>
					        <input hidden type="text" name="id" value="<?php echo $item['id'] ?>">

					        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
						    <i class="material-icons right">send</i>
						  </button>


						</form>
						

					</div>
				</div>
			</div>
	
<?php 
			require_once '../partials/footer.php';
		}	else {

		header('Location: ./error.php');
	}


?>

