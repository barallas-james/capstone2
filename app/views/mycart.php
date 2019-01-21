<?php 
	require_once '../partials/layout.php'; 

	function get_page_content() { 

		if(!isset($_SESSION['logged_in_user']) || $_SESSION['logged_in_user']['role_id'] == 2  ) {
?>
		<div class="content">
			<?php require_once '../partials/header.php'; ?>

			<div class="container mt25">
				<h2>My Cart</h2>
				
				<table class="responsive-table striped">
				<thead>
					<tr>
						<th>Item Name</th>
						<th>Item Price</th>
						<th>Item Quantity</th>
						<th>Item Subtotal</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					require '../controllers/connect.php';

					// var_dump($_SESSION['cart']);

					if(isset($_SESSION['cart']) && count($_SESSION['cart']) !=0) {

						$cart_total = 0;
						

						foreach ($_SESSION['cart'] as $id => $qty){
							$sql = "SELECT * FROM items WHERE id ='$id' ";

							$result = mysqli_query($conn, $sql);
							$item = mysqli_fetch_assoc($result);
							$subTotal = $_SESSION['cart'][$id] * $item['price'];
							$cart_total += $subTotal;
					 ?>		

							<tr>
								<td> <?php echo $item['name']; ?></td>
								<td> <?php echo $item['price']; ?></td>
								<td class="item_quantity" data-id="<?php echo $id; ?>" min="1" >
									<input type="number" value="<?php echo $qty; ?>" data-id="<?php echo $id; ?>" min="1">
								</td>
								<td class="item_subtotal"> <?php echo $subTotal; ?></td>
								<td>
									<button class="btn item-remove red darken-4 text-white" data-id="<?php echo $id; ?>">Remove from cart</button>
								</td>
							</tr>

					<?php 
						
						} 
					?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">Total</td>
						<td id="total_price"><b>
							<?php echo $cart_total; ?>
						</b></td>

						<?php if (isset($_SESSION['logged_in_user'])) { ?>
          
						<td><a href="./checkout.php" class="btn deep-orange darken-2">Proceed To Checkout</a></td>
				   
				        <?php } ?>
					</tr>
				</tfoot>
				
				<?php 
					} else {
						echo '<tr>
								<td colspan="6"> No items in the cart </td>
							  </tr>
						';
					}

				 ?>
			</table>

			</div>

			
		</div>
	
<?php 

		mysqli_close($conn);
		require_once '../partials/footer.php';
		}	else {

		header('Location: ./error.php');
		}
	}; 
?>

