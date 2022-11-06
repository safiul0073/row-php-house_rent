
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

<?php
var_dump($_SESSION['username']);

    $username = $_SESSION['username'];
    $user = $db->query("SELECT * FROM users where username = '$username'")->fetch_assoc();
?>
<div class=" bootstrap snippets bootdey">
    <hr>
<form style="width:100% !important;" enctype="multipart/form-data" action="profile.php" method="post" >
<div class="row mx-4">
    <!-- left column -->
    <div class="col-md-3">
    <div class="text-center">
        <img src="<?php echo (isset($user['avater']) ? '../assets/uploads/' .$user['avater'] : 'https://bootdey.com/img/Content/avatar/avatar7.png'); ?>" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        
        <input type="file" name="image" class="form-control">
    </div>
    </div>
    
    <!-- edit form column -->
    <div class="col-md-9 personal-info">
    <h3>Personal info</h3>
    
 
    <div class="form-horizontal">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo isset($user['id']); ?>" >
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
            <input class="form-control" type="text" name="name" value="<?php echo $user['name'] ?>" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
            <input class="form-control" type="text" name="username" value="<?php echo $user['username'] ?>" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
            <input class="form-control" type="email" value="<?php echo $user['email'] ?>" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-8">
            <input class="form-control" type="number" value="<?php echo $user['phone'] ?>" name="phone" value="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
            <input class="form-control" type="password" name="password">
            </div>
        </div>
        <div class="col-lg-8">
            <button type="submit" name="update_owner" class="btn btn-block btn-success">Save</button>
        </div>
        </div>
    
    </div>

</div>
</div>
<hr>
</form> 
</div>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>