<?php 
	
	require_once '../partials/layout.php'; 


	function get_page_content() { 
?>
		<div class="content">
			<div class="parallax">
				<?php require_once '../partials/header.php'; ?>

				<div class="box">
					<h1><b>Dapper Lifestyle</b></h1>
					<hr>
					<p class="mt25"><b>Dressing well and keeping it simple at the same time</b></p>
				</div>

			</div>

			<div class="container mt25">
				<div class="row">
				    

				    <div class="col s12 m6 l4">
				      <div class="card">
				        <div class="card-image">
				          <img src="../assets/images/polos.jpg">
				          <span class="card-title">Polos</span>
				        </div>
				        <div class="card-content">
				          <p>I am a very simple card. I am good at containing small bits of information.
				          I am convenient because I require little markup to use effectively.</p>
				        </div>
				        <div class="card-action">
				          <a href="catalog.php?category=polos" class="waves-effect waves-light btn-small deep-orange darken-2"><i class="material-icons right">navigation</i>Click Here</a>
				        </div>
				      </div>
				    </div>

				    <div class="col s12 m6 l4">
				      <div class="card">
				        <div class="card-image">
				          <img src="../assets/images/pants.jpg">
				          <span class="card-title">Pants</span>
				        </div>
				        <div class="card-content">
				          <p>I am a very simple card. I am good at containing small bits of information.
				          I am convenient because I require little markup to use effectively.</p>
				        </div>
				        <div class="card-action">
				          <a href="catalog.php?category=pants" class="waves-effect waves-light btn-small deep-orange darken-2"><i class="material-icons right">navigation</i>Click Here</a>
				        </div>
				      </div>
				    </div>

				    <div class="col s12 m6 l4">
				      <div class="card">
				        <div class="card-image">
				          <img src="../assets/images/shoes.jpg">
				          <span class="card-title">Shoes</span>
				        </div>
				        <div class="card-content">
				          <p>I am a very simple card. I am good at containing small bits of information.
				          I am convenient because I require little markup to use effectively.</p>
				        </div>
				        <div class="card-action">
				          <a href="catalog.php?category=shoes" class="waves-effect waves-light btn-small deep-orange darken-2"><i class="material-icons right">navigation</i>Click Here</a>
				        </div>
				      </div>
				    </div>

				  </div>

			</div>

		</div>


<?php 
		require_once '../partials/footer.php';
	}; 
?>
