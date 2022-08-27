<?php

if (isset($_POST['signin'])) {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "Select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location:index.php");
        }

    }
    else {
        $showError = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="index.css">
</head>

<body id="page-top">
    <?php require 'partials/_nav.php'?>
    <?php
    $showAlert = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

   
    $existSql = "SELECT * FROM `users` WHERE username= '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
      $showError = "Username already exists";
    }
    else {
      if (($password == $cpassword)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`, `email`, `password`, `dt`) VALUES ('$username','$email', '$hash', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          $showAlert = true;
        }
      }
      else {
        $showError = "Password do not match";
      }
    }

  }
}

if ($showAlert) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account is now created and you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($showError) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $showError . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>

    <header class="d-flex masthead" style="background-image:url('assets/img/bg-masthead.jpg');">
        <div class="container my-auto text-center">
            <h1 class="mb-1">Pustakalaya</h1>
            <h3 class="mb-5"><em><br>Second hand books are wild books, homeless books; they have come together in vast flocks of variegated feather, and have a charm which the domesticated volumes of the library lack.<br><br></em></h3>
            <?php

            if($loggedin){
    echo '<a class="btn btn-primary btn-xl js-scroll-trigger" role="button" href="reg.php">Register</a>';
            }
            ?>
            <div class="overlay"></div>
        </div>
    </header>
    <?php
    if($loggedin){
    echo '<section  class="content-section bg-light">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h2><br>Help yourself and others!<br></h2>
                    <p class="lead mb-5"><span>You can&nbsp;</span><a href="books.php">find&nbsp;</a><span>&nbsp;and&nbsp;</span><span><a href="reg.php">register</a><span>&nbsp;books easily and help others</span>!</span></p><a class="btn btn-dark btn-xl js-scroll-trigger" role="button" href="#services">What We Offer</a>
                </div>
            </div>
        </div>
    </section>';
    }
    ?>
    <section id="services" class="content-section bg-primary text-white text-center">
        <div class="container">
            <div class="content-section-heading">
                <h3 class="text-secondary mb-0">Services</h3>
                <h2 class="mb-5">What We Offer</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-screen-smartphone"></i></span>
                    <h4><strong>Responsive</strong></h4>
                    <p class="mb-0 text-faded">Looks great on any screen size!</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-pencil"></i></span>
                    <h4><strong>Register</strong></h4>
                    <p class="mb-0 text-faded">Too many books , register here!<br></p>
                </div>
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-like"></i></span>
                    <h4><strong>Find</strong></h4>
                    <p class="mb-0 text-faded"><span>Milions of users&nbsp;</span><i class="fa fa-heart"></i><span>&nbsp;us!</span></p>
                </div>
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0"><span class="mx-auto service-icon rounded-circle mb-3"><i class="icon-mustache"></i></span>
                    <h4><strong>Question</strong></h4>
                    <p class="mb-0 text-faded">Have any query,contact us!<br><br></p>
                </div>
            </div>
        </div>
    </section>
    <section class="callout" id="about" style="background:linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 100%), url(&quot;assets/img/bg-callout.jpg&quot;);background-position:center center;background-repeat:no-repeat;background-size:cover;">
        <div class="container text-center">
            <h2 class="mx-auto mb-5"><span>About Us</span></h2>
            <p>During my school days , I suffered a lot to find books from senior's . So I have decided to make something where students can find books. Also at some stage I have lot of books and I wanted to give other students.</p>
            <p>So, here is the website where you can find and also can register books according to your convinence. </p>
        </div>
    </section>
    
    <section id="portfolio" class="content-section">
        <div class="container">
            <div class="content-section-heading text-center">
                <h3 class="text-secondary mb-0">Welcome Peeps</h3>
                <h2 class="mb-5">Learn and Grow</h2>
            </div>
            <div class="row g-0">
                <div class="col-lg-6"><a class="portfolio-item" href="#">
                        <div class="caption">
                            <div class="caption-content">
                                <h2>Wohoo</h2>
                                <p class="mb-0">Have books register!</p>
                            </div>
                        </div><img class="img-fluid" src="assets/img/portfolio-1.jpg">
                    </a></div>
                <div class="col-lg-6"><a class="portfolio-item" href="#">
                        <div class="caption">
                            <div class="caption-content">
                                <h2>Find Books</h2>
                                <p class="mb-0">You can search by book name and also by location!</p>
                            </div>
                        </div><img class="img-fluid" src="assets/img/portfolio-2.jpg">
                    </a></div>
                <div class="col-lg-6"><a class="portfolio-item" href="#">
                        <div class="caption">
                            <div class="caption-content">
                                <h2>contact</h2>
                                <p class="mb-0">Have any query, contact us!</p>
                            </div>
                        </div><img class="img-fluid" src="assets/img/portfolio-3.jpg">
                    </a></div>
                <div class="col-lg-6"><a class="portfolio-item" href="#">
                        <div class="caption">
                            <div class="caption-content">
                                <h2>Free</h2>
                                <p class="mb-0">Free of cost.</p>
                            </div>
                        </div><img class="img-fluid" src="assets/img/portfolio-4.jpg">
                    </a></div>
            </div>
        </div>
    </section>
    <section class="callout" id="contact" style="background:linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 100%), url(&quot;assets/img/bg-callout.jpg&quot;);background-position:center center;background-repeat:no-repeat;background-size:cover;">
        <div class="container text-center">
            <h2 class="mx-auto mb-5"><span>Contact Us</span></h2>
            <p>Email: Bookstore@gmail.com</p>
            <p>Telephone No: 2345678234</p>
        </div>
    </section>
    <footer class="footer text-center">
        <div class="container">
            <ul class="list-inline mb-5">
                <li class="list-inline-item">&nbsp;<a class="link-light social-link rounded-circle" href="#"><i class="icon-social-facebook"></i></a></li>
                <li class="list-inline-item">&nbsp;<a class="link-light social-link rounded-circle" href="#"><i class="icon-social-twitter"></i></a></li>
                <li class="list-inline-item">&nbsp;<a class="link-light social-link rounded-circle" href="#"><i class="icon-social-github"></i></a></li>
            </ul>
            <p class="text-muted mb-0 small">Copyright &nbsp;© Brand 2022</p>
        </div><a class="js-scroll-trigger scroll-to-top rounded" href="#page-top"><i class="fa fa-angle-up"></i></a>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/stylish-portfolio.js"></script>
</body>
</html>
