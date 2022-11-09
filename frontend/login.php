<?php include('server.php') ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="../assets/css/frontend.css" rel="stylesheet">
  </head>
  <body>
    <!-- topbar and navigation -->
     <!-- topbar and navigation -->
     <div class="rh-header">
        <div class="container">
            <div class="rh-header-inner">
                <a href="#" class="rh-logo">
                    <img src="../assets/images/Tcolor.png" alt="t-color">
                </a>
                <nav class="rh-nav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Houses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Rents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <?php if (isset($_SESSION['username'])) { ?>
                            <div class="dropdown">
                                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" href="./dashboard.php">Dashboard</a>
                                    <a class="dropdown-item" href="./profile.php">Profile</a>
                                    <a onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item" href="./login.php">Logout</a>
                                    <form id="logout-form" action="logout.php" method="POST" class="d-none">

                                    </form>
                                </div>
                            </div>
                        <?php } else {  ?>
                            <a class="rh-btn btn btn-sm btn-outline-primary mr-2" href="./login.php">Login</a>
                            <a class="rh-btn btn btn-sm btn-outline-primary" href="./register.php">SignUp</a>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <div class="card mx-4" >
        <main class="container" style="height: 450px;">
                <div class="text-center pt-5">
                    <p>Enter Login Information</p>
                </div>
                <div class="row">
                    <div class="col-12 mx-auto">
                        <form method="post" action="login.php">
                        <?php include('errors.php'); ?>
                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" name="username" >
                        </div>
                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn2" name="login_user">Login</button>
                        </div>
                        <p>
                            Not yet a member? <a href="register.php">Sign up</a>
                        </p>
                        </form>
                    </div>
                </div>

            </main>
        </div>
        
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>