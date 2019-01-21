<?php 
require_once '../partials/layout.php'; 

function get_page_content() { 

	if(isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role_id'] == 1 ) {

?>
		<div class="content">
			<?php require_once '../partials/header.php'; ?>
			<div class="container">
				
				<h4>User Admin Page</h4>

				<div class="row">
					<div class="col s12 ">
						<table class="responsive centered">
							<thead>
								<th>Username</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Actions</th>
							</thead>
							<tbody>
								<?php 
								require_once('../controllers/connect.php');

								$getUsers = "SELECT u.id, u.uName, u.fName, u.lName, u.email, r.name AS role FROM users u JOIN roles r ON (u.role_id = r.id); ";
								$detailsUser = mysqli_query($conn, $getUsers);
								foreach ($detailsUser as $indivUser) {
										// var_export($indiv_user);
								 ?>
								 <tr>
								 	<td><?php echo $indivUser['uName']; ?></td>
								 	<td><?php echo $indivUser['fName']; ?></td>
								 	<td><?php echo $indivUser['lName']; ?></td>
								 	<td><?php echo $indivUser['email']; ?></td>
								 	<td><?php echo $indivUser['role']; ?></td>
								 	<td>
								 		<?php if ($indivUser['role'] != 'Admin'){ ?>
								 			<a href="../controllers/grantAdmin.php?id=<?php echo $indivUser['id']; ?>" class="btn">Grant Admin</a> 
								 		<?php } else{ ?>
								 			<a href="../controllers/grantAdmin.php?id=<?php echo $indivUser['id']; ?>" class="btn">Revoke Admin</a> 
								 		<?php }  ?>

								 	</td>
								 </tr>
								<?php
								}; 
								mysqli_close($conn);
								?>

							</tbody>
							<tfoot>
								
							</tfoot>


						</table>


					</div>
				</div>
			</div>
		</div>

<?php 
		require_once '../partials/footer.php';
	
	}	else {

	header('Location: ./error.php');
	}

}


?>

