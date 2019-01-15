<nav>
  <div class="nav-wrapper grey darken-4">
    <div class="container">
      <a href="index.php" class="brand-logo"><b>Soots</b></a>
      <a href="" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="catalog.php">Catalog</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact Us</a></li>
        <li><a href="mycart.php">My Cart <span id="cart-count" class="new badge red darken-4 text-white" data-badge-caption=""><?php if (isset($_SESSION['cart'])){ echo array_sum($_SESSION['cart']); } else{ echo '0'; }?></span></a></li>
        <?php if (!isset($_SESSION['logged_in_user'])) { ?>
          <li><a class="waves-effect waves-light btn-large deep-orange darken-2 modal-trigger" href="#login">Login</a></li>
        <?php } ?>

        <?php if (isset($_SESSION['logged_in_user'])) { ?>
          
          <!-- Dropdown Trigger -->
          <a class='dropdown-trigger btn-large waves-effect waves-light deep-orange darken-2' href='#' data-target='dropdown1'><?php echo $_SESSION['logged_in_user'] ?></a>

          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="">Profile</a></li>
            <li><a id="userLogout" href="../controllers/userLogout.php">Logout</a></li>
            
          </ul>
        <?php } ?>

      </ul>
    </div>
  </div>
</nav>

<ul class="sidenav" id="mobile-demo">
  <li><a><h5>Navigation</h5></a></li>
  <li><hr></li>
  <li><a href="index.php">Home</a></li>
  <li><a href="catalog.php?category=All">Catalog</a></li>
  <li><a href="">About</a></li>
  <li><a href="">Contact Us</a></li>
  <li><a href="mycart.php">My Cart <span id="cart-count" class="new badge red darken-4 text-white" data-badge-caption=""><?php if (isset($_SESSION['cart'])){ echo array_sum($_SESSION['cart']); }?></span></a></li>
  <?php if (!isset($_SESSION['logged_in_user'])) { ?>
    <li><a class="waves-effect waves-light btn-large deep-orange darken-2 modal-trigger" href="#login">Login</a></li>
  <?php } ?>

  <?php if (isset($_SESSION['logged_in_user'])) { ?>
    <!-- Dropdown Trigger -->
    <li><a class='dropdown-trigger btn-large waves-effect waves-light deep-orange darken-2' href='#' data-target='dropdown2'><?php echo $_SESSION['logged_in_user'] ?></a></li>

    <!-- Dropdown Structure -->
    <li><ul id='dropdown2' class='dropdown-content'>
      <li><a href="">Profile</a></li>
      <li><a id="userLogout" href="../controllers/userLogout.php">Logout</a></li>
      
    </ul></li>
  <?php } ?>
</ul>


<!-- Modal Structure -->
<div id="login" class="modal">
  <div class="modal-content">
    <h4>Login</h4>
    
    <div class="row">
      <div class="col s12">
        <div class="row">
          <div class="input-field col s10 offset-s1">
            <i class="material-icons prefix">account_circle</i>
            <input id="loginUser" type="text">
            <label for="loginUser">Username</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s10 offset-s1">
            <i class="material-icons prefix">vpn_key</i>
            <input id="loginPass" type="password">
            <label for="loginPass">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s10 offset-s1">
            <p>Sign Up: <a href="register.php">Click Here</a></p>
          </div>
        </div>
        <div class="modal-footer">
         
          
          <a id="userLogin" class="waves-effect waves-light btn-large deep-orange darken-2">Login</a>
          
          
        </div>
      </div>
    </div>


  </div>
</div>