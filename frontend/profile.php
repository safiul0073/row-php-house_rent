
<?php include('server.php') ?>
<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Edit Profile</title>
</head>
<body>
<!-- topbar and navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./">Property Seller</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
        </ul>
        <div class="form-inline my-2 my-lg-0">
        <?php if (isset($_SESSION['username'])) { ?>
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </button>
                <div class="dropdown-menu bg-light" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item " href="./dashboard.php" >Dashboard</a>
                    <a class="dropdown-item" href="./profile.php" >Profile</a>
                    <a class="dropdown-item" href="./login.php" >Logout</a>
                </div>
            </div>
        <?php } else {  ?>
            <a class="btn btn-sm btn-outline-primary mr-2" href="./login.php">Login</a>
            <a class="btn btn-sm btn-outline-primary" href="./register.php">SignUp</a>
        <?php } ?>
        </div>
    </div>

</nav>
<?php if (isset($_SESSION['success'])) : ?>
    <div class="error success">
        <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>
    </div>
<?php endif ?>
<div class=" bootstrap snippets bootdey">
    <hr>
<div class="row mx-4">
    <!-- left column -->
    <div class="col-md-3">
    <div class="text-center">
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        
        <input type="file" class="form-control">
    </div>
    </div>
    
    <!-- edit form column -->
    <div class="col-md-9 personal-info">
    <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
    </div>
    <h3>Personal info</h3>
    
    <form action="profile.php" method="post" >
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
            <input class="form-control" type="text" value="dey-dey">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
            <input class="form-control" type="text" value="bootdey">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Company:</label>
            <div class="col-lg-8">
            <input class="form-control" type="text" value="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
            <input class="form-control" type="text" value="janesemail@gmail.com">
            </div>
        </div>
        <div>
            <button type="submit" name="update_owner" class="btn btn-block btn-success">Save</button>
        </div>
        </div>
    </form>
    </div>

</div>
</div>
<hr>
    
</div>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>