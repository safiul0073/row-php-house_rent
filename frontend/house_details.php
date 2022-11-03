<?php include('server.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- topbar and navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
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
        <div class="alert alert-success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <?php 
                $id = $_GET['id'];
                $sql = "SELECT h.*,c.name as cname FROM houses h inner join categories c on c.id = h.category_id WHERE h.id = '$id'";
                $result = $db->query($sql);
                $row = $result->fetch_assoc();
            ?>
    <!-- Optional JavaScript; choose one of the two! -->
    <div class="card mx-4" >
        <div class="card-header" >
            <h1 class="card-title">House Number: <?php echo $row['house_no']; ?></h1>
        </div>
        <div class="card-body">
            <div class="row py-5">
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <?php 
                                if (!$row['image']) {
                            ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <?php 
                                }else {
                                    $array_images = explode(',', $row['image'] );
                                    $count = count($array_images);
                                    for ($i = 0; $i < $count - 1;  $i++) {
                            ?>  
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? "active" : ""); ?>"></li>
                            <?php 
                                    }
                                }
                            ?>

                        </ol>
                        <div class="carousel-inner">
                            <?php 
                                if (!$row['image']) {
                            ?>
                                <div class="carousel-item active">
                                <img src="../assets/images/house1.jpg" height="550" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="../assets/images/house2.jpg" height="550" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="../assets/images/house3.jpg" height="550" class="d-block w-100" alt="...">
                                </div>
                            <?php 
                                }else {
                                    for ($i = 0; $i < $count - 1;  $i++) {
                            ?>  
                                      <div class="carousel-item <?php echo ($i == 0 ? "active" : ""); ?>">
                                        <img src="../assets/uploads/<?php echo $array_images[$i]; ?>" height="550" class="d-block w-100" alt="...">
                                      </div>
                            <?php 
                                    }
                                }
                            ?>
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

                <div class="col-md-6 pl-5">
                    <h3 class="text-left text-dark">Category: <span><?php echo $row['cname']; ?></span></h3>
                    <h3 class="text-left text-dark">Price: <span><?php echo $row['price']; ?>tk</span></h3>
                    <h3 class="text-left text-dark">Flat: <span><?php echo $row['flat']; ?></span></h3>
                    <h3 class="text-left text-dark">Unit: <span><?php echo $row['unit']; ?></span></h3>
                    <h3 class="text-left text-dark">Garage: <span><?php echo $row['isGarage'] ? "Yes" : "no"; ?></span></h3>
                    <div class="mt-2">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            ?>
                            <a href="./login.php" class="btn btn-outline-secondary" >Purchase Now</a>
                        <?php
                        }else {
                            ?> 
                            <button type="button" class="btn btn-outline-secondary" <?php echo ($row['is_selled'] ? 'disabled' : ''); ?> data-toggle="modal" data-target="#exampleModal">Purchase Now</button>
                            <?php
                            }
                            ?>
                        
                    </div>
                </div>

            </div>

            <!-- description -->
            <div class="py-4 px-4">
                <p><?php echo $row['description']; ?></p>
            </div>
        </div>
        
    </div>

    <!-- modal -->
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Purchase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="house_details.php?id=<?php echo $row['id'] ?>" method="post">
        <input type="hidden" name="house_id" value="<?php echo $row['id']; ?>">
        <div class="modal-body">
            <div class="py-3">
                <h3 class="text-left text-dark">House Number: <?php echo $row['house_no']; ?></h3>
                <h3 class="text-left text-dark">Price: <span><?php echo $row['price']; ?>tk</span></h3>
                <h3 class="text-left text-dark">Flat: <span><?php echo $row['flat']; ?></span></h3>
                <h3 class="text-left text-dark">Unit: <span><?php  echo $row['unit']; ?></span></h3>
                <h3 class="text-left text-dark">Garage: <span><?php echo $row['isGarage'] ? "Yes" : "no"; ?></span></h3>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="purches_house" class="btn btn-primary">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script >
        // function submitForm () {

        // }
    </script>
  </body>
</html>