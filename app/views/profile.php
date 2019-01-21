<?php 
require_once '../partials/layout.php'; 

function get_page_content() { 
	
?>
	<div class="content">
		<?php require_once '../partials/header.php'; ?>

		<?php $user = $_SESSION['logged_in_user']; ?>

		<div class="container">

			<h3>User Information</h3>
			<form id="update_user_details" action="../controllers/updateProfile.php" method="POST">

				<input type="text" class="form-control" name="user_id" value="<?php echo $user['id'] ?>" hidden>
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['uName'] ?>" disabled>
				<span class="validation"></span><br>
				<label for="firstname">First Name</label>
				<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['fName'] ?>">
				<span class="validation"></span><br>
				<label for="lastname">Last Name</label>
				<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lName'] ?>">
				<span class="validation"></span><br>
				<label for="email">E-mail Address</label>
				<input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email'] ?>">
				<span class="validation"></span><br>
				<label for="address">Address</label>
				<input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address'] ?>">
				<span class="validation"></span><br>
				<br>
				<button type="button" class="btn" id="update_info">Update Info</button>

			</form>



			<h3>Order History</h3>

			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr class="text-center">
							<th>Transaction Number</th>
							<th>Purchase Date</th>
							<th>Status</th>
							<th>Payment Mode</th>
						</tr>
					</thead>
					<tbody>
						<?php

						require '../controllers/connect.php';

						$sql = "SELECT o.transaction_code, o.purchase_date, s.name AS status, p.name AS payment_mode FROM orders o JOIN statuses s ON (o.status_id = s.id) JOIN payment_modes p ON (o.payment_mode_id = p.id) WHERE user_id = ". $user['id'];


						$transactions = mysqli_query($conn, $sql);
						foreach($transactions as $transaction) { 
						?>
							<tr>
								<td><?php echo $transaction['transaction_code'] ?></td>
								<td><?php echo $transaction['purchase_date'] ?></td>
								<td><?php echo $transaction['status'] ?></td>
								<td><?php echo $transaction['payment_mode'] ?></td>
							</tr>

						<?php  
						}  
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


<?php 

mysqli_close($conn);
require_once '../partials/footer.php';
}; 
?>

