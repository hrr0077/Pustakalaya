<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
}
else {
  $loggedin = false;
}


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Book Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact Us</a>
        </li>';
if (!$loggedin) {
  echo '<li class="nav-item">
          <button type="button" class="btn " data-bs-target="#signin" data-bs-toggle="modal">Sign In</button>
          <div class="modal" id="signin">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <!-- <a class="nav-link" id="signin">Sign In</a> -->
                    <h5 class="modal-title">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  
                    <!-- sign in -->
                    <form class="form-container" method="post">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                      </div>
                      <div class="d-grid gap-2">
                        <input class="btn btn-warning" name="signin" type="submit" value="Sign In">
                        </div>
                      <p>Do not have an Account?<button type="button" class="btn btn-link"data-bs-target="#signup" data-bs-toggle="modal" style="color: black;">SignUp</button></p>
                    </form>
                  </div>
                </div>
                </div>
            </div>          
        </li>
        <li class="nav-item">
          <button type="button" class="btn "  data-bs-target="#signup" data-bs-toggle="modal">Sign Up</button>
          <div class="modal" id="signup">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Sign Up</h5>
                    <button type="button" class="btn-close btn-warning" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
      
                    <form class="form-container" method="post" action="index.php">
                      <div class="form-container">
                        <!-- <form method="post"> -->
                         <h2 class="text-center">Create an account.</h2>
                            <div class="form-group"><input class="form-control" type="name" name="username" placeholder="Username" required></div>
                           <br>
                            <div class="form-group"><input class="form-control" type="email" name="email" required="" placeholder="email"data-error="enter email" required>
                            </div>
                         <br>
                            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
                            <br>
                            <div class="form-group"><input class="form-control" type="password" name="cpassword" placeholder="Password (again)" required></div>
                            <div id="cpassword" class="form-text">Make sure to type the same password.</div>
                            <div class="form-group">
                              <br>
                            </div>
                            <br>
                            <div class="d-grid gap-2">
                              <input class="btn btn-warning" name= "signup" type="submit" value="Sign Up">
                            </div>
                            <p>Already have an Account?<button type="button" class="btn btn-link" data-bs-target="#signin" data-bs-toggle="modal" style="color: black;">Sign In</button></p>
                            </form>
                            </div>
                  <!-- </form> -->
                  </div>
                </div>
                </div>
            </div>
          </li>';
}

echo '</ul>';
if ($loggedin) {

  echo '
  <li class="nav-item ">
          <a class="nav-link text-muted " href="books.php">Books</a>
        </li>
  <li class="nav-item ">
          <a class="nav-link text-muted " href="reg.php">Register book</a>
        </li>
  <li class="nav-item">
          <a class="nav-link text-muted " href="logout.php">Logout</a>
        </li>';
}
?>
</div>
  </div>
  <?php
  if($loggedin){
  echo '<form class="d-flex mx-3" method="GET" action="search.php">
        <input class="form-control me-2" type="search" name="search" required value="'?><?php if (isset($_GET['search'])) {
          echo $_GET['search'];
        } 
          ?>
<?php
        echo  '" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>';
  }
      ?>
</nav>


