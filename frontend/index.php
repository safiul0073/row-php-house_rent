
<?php include('server.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Property Seller</title>
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
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a class="dropdown-item" href="./dashboard.php" >Dashboard</a>
                        <a class="dropdown-item" href="./profile.php" >Profile</a>
                        <a onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item" href="./login.php" >Logout</a>
                         <form id="logout-form" action="logout.php" method="POST" class="d-none">
                            
                        </form>
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
    <div class="row py-5">
    <div id="carouselExampleIndicators" class="carousel slide col-10 mx-auto" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="../assets/images/house1.jpg" height="550" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="../assets/images/house2.jpg" height="550" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="../assets/images/house3.jpg" height="550" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    
    <?php
        $houses = "SELECT h.*,c.name as cname FROM houses h inner join categories c on c.id = h.category_id where h.is_selled = 0 order by id asc";
        $results = $db->query($houses);
    ?>
    <div class="card mx-4" >
        <div class="card-header" >
            <h1 class="card-title">Houses overview</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <?php 
                 if ($results) {
                    foreach ( $results as $result ) {
                        ?>

                <div class="col-md-4">
                    <div class="card my-3">
                    <img src="../assets/uploads/<?php echo ( $result['image'] ? explode(',', $result['image'])[0]  : ''); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Hello No: <?php echo $result['house_no'] ?></h5>
                        <h5 class="card-title">Price: <?php echo $result['price'] ?></h5>
                        <a href="house_details.php?id=<?php echo $result['id'] ?>" class="btn btn-primary">See More</a>
                    </div>
                    </div>

                </div>

                <?php 
                            } 
                        }
                        ?>
               
            </div>
        </div>
        
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>