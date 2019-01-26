<?php 
require_once '../partials/layout.php'; 

function get_page_content() { 
	if (!isset($_SESSION['logged_in_user'])) { 
?>
		<div class="content">
			<?php require_once '../partials/header.php'; ?>

			<div class="container mt25 mb25">
				<div class="registration">
					<h1>Register</h1>

					<div class="personalInfo">
						<h5>Personal Details</h5>
						<div class="row">
							<div class="col m12">
								<div class="row">
									<div class="input-field col m6 s12">
										<i class="material-icons prefix">account_box</i>
										<input id="fName" type="text" >
										<label for="fName">First Name</label>
									</div>
									<div class="input-field col m6 s12">
										<i class="material-icons prefix">account_box</i>
										<input id="lName" type="tel" >
										<label for="lName">Last Name</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col s12">
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">home</i>
										<input id="address" type="text" >
										<label for="address">Address</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col s12">
								<div class="row">
									<div class="input-field col m6 s12">
										<i class="material-icons prefix">phone</i>
										<input id="telephone" type="text" >
										<label for="telephone">Telephone</label>
									</div>
									<div class="input-field col m6 s12">
										<i class="material-icons prefix">phone_android</i>
										<input id="cellphone" type="tel" >
										<label for="cellphone">Cellphone</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col s12">
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">email</i>
										<input id="email" type="text" >
										<label for="email">E-Mail Address</label>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="accountInfo mt25">
						<h5>Account Details</h5>
						<div class="row">
							<div class="col s12">
								<div class="row">
									<div class="input-field col m6 s12">
										<i class="material-icons prefix">account_circle</i>
										<input id="uName" type="text" >
										<label for="uName">Username</label>
									</div>
									<div class="input-field col m6 s12">
										<i class="material-icons prefix">vpn_key</i>
										<input id="password" type="tel" >
										<label for="password">Password</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col s12">
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">vpn_key</i>
										<input id="confirmPass" type="text" >
										<label for="confirmPass">Confirm Password</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col l3 offset-l9">
								<a id="userRegister" class="waves-effect waves-light btn-large deep-orange darken-2"><i class="material-icons left">cloud</i>Register</a>
							</div>


						</div>
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

