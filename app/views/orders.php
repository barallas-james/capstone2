<?php 

require_once '../partials/layout.php'; 

function get_page_content() { 
	if(isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role_id'] == 1) {
?>
		<div class="content">
			<?php require_once '../partials/header.php'; ?>


			<div class="container">
				<h4>Orders Admin Page</h4>
				<div class="row">
					<div class="col-sm-8 offset-sm-2">
						<table class="table table-striped">
							<thead>
								<th>Transaction Code</th>
								<th>Status</th>
								<th>Actions</th>
							</thead>

							<tbody>
<?php 

								require_once '../controllers/connect.php'; 

								$order_query = "SELECT o.id, o.transaction_code, o.status_id, s.name AS status FROM orders o JOIN statuses s ON (o.status_id = s.id);";
								$orders = mysqli_query($conn, $order_query);
								foreach($orders as $order){
								// var_dump($order);
?>
									<tr>
										<td><?php echo $order['transaction_code']; ?></td>
										<td><?php echo $order['status']; ?></td>
										<td>
											<?php if($order['status']=="Pending") { ?>
												<a href="../controllers/completeOrder.php?id=<?php echo $order['id']; ?>" class="btn btn-success">Complete Order</a>
												<a href="../controllers/cancelOrder.php?id=<?php echo $order['id']; ?>" class="btn btn-danger">Cancel Order</a>
											<?php }; ?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table> <!-- end table -->
					</div> <!-- end columns -->
				</div> <!-- end row -->
			</div> <!-- end container -->
		</div>
<?php 

		require_once '../partials/footer.php';

	} else {
		header('Location: ./error.php');
	} 

} 

?>
