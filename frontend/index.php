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
    <link href="../assets/css/frontend.css" rel="stylesheet">
    <title>Property Seller</title>
</head>

<body>
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
    <!-- <div class="row py-5">
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
        </div> -->

    <div class="rh-hero">
        <div class="container">
            <div class="rh-hero-inner">
                <h1 class="rh-title">One-stop <br /> Housing Solution</h1>
                <p class="rh-info">Rental Solution</p>
                <button class="explore-button">Explore Properties</button>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <?php
    $houses = "SELECT h.*,c.name as cname FROM houses h inner join categories c on c.id = h.category_id where h.is_selled = 0 order by id asc";
    $results = $db->query($houses);
    ?>

    <div class="rh-section">
        <div class="container">
            <h4 class="rh-sub-title">Properties by Area</h4>
            <div class="row">
                <?php
                    if ($results) {
                        foreach ($results as $result) {
                            ?>
                    
                <div class="col-sm-3">
                    <a href="house_details.php?id=<?php echo $result['id']; ?>">
                    <div class="rh-service-card">
                        <h5 class="property-count">Name: <?php echo $result['house_no']; ?></h5>
                        <h4 class="property-area"><?php echo $result['address']; ?></h4>
                    </div>
                    </a>
                </div>
               <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>


    <div class="rh-section bg-white">
        <div class="container">
            <h4 class="rh-sub-title">Explore by Properties</h4>
            <div class="row">
                <div class="col-sm-6">
                    <div class="rh-property-card" style="background-image: url(../assets/images/sale-1.jpg)">
                        <h5 class="rh-property-type">For Sale</h5>
                        <h4 class="rh-property-count">15 properties</h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="rh-property-card" style="background-image: url(../assets/images/Seviced.jpg)">
                        <h5 class="rh-property-type">Service Apartment <br> ( Rent )</h5>
                        <h4 class="rh-property-count">15 properties</h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="rh-property-card" style="background-image: url(../assets/images/Rent.jpg)">
                        <h5 class="rh-property-type">To-Let</h5>
                        <h4 class="rh-property-count">15 properties</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rh-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <img class="img-fluid w-full" src="../assets/images/BH-Trans-pkokm55gbbpx6afuyopf69jknkt3hhlqx8rabrmtck.png" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="rh-paragraph-wrapper">
                        <p class="rh-paragraph">Our journey began from a one bedroom apartment based in Las Vegas, USA in 2003, where we started to sell plots and flats for Bashundhara Housing to Non Residential Bangladeshis.</p>
                        <p class="rh-paragraph">We represented Bashundhara Housing and took their products to every corner of the USA and Canada, to thousands of Non Residential Bangladeshis living abroad. We professionally and legally served many of their existing and potential clients, managed and maintained every transaction of Bashudhara Housing took place in North America. Our honesty, integrity and customer service rewarded us with more than three thousand sales in just three years. Soon, many other renowned Real Estate companies of Bangladesh appointed us as their exclusive sales agent. We represented some of the renowned companies named: Swadesh Properties Ltd., Biswas Builders Ltd., AG Properties Ltd., SAKPDL Properties Ltd. We proudly sold some apartment products of Shanta Properties and Building Technologies and Ideas Ltd (BTI).</p>
                        <p class="rh-paragraph">By 2010, we served more than 9,000 clients in North America, Australia, and Bangladesh</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img class="img-fluid w-full" src="../assets/images/BH-Trans-pkokm55gbbpx6afuyopf69jknkt3hhlqx8rabrmtck.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="rh-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center pt-3">
                    <a class="footer-logo" href="#"><img src="../assets/images/TColor.png" /></a>
                </div>
                <div class="col-md-3 text-center pt-2">
                    <h3 class="footer-heading">Bangladesh Office</h3>
                    <p class="footer-info"> House 1, Floor 1, Road 6, Sector 3, <br>Uttara, Dhaka</p>
                </div>
                <div class="col-md-3 text-center pt-2">
                    <h3 class="footer-heading">Important Links</h3>
                    <ul class="footer-nav">
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
                </div>
                <div class="col-md-3 d-flex justify-content-center items-center"><a href="#" class="footer-mail-link"><img decoding="async" loading="lazy" width="250" height="250" src="https://dhakahome.com/wp-content/uploads/2021/09/WebMail-1.gif" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>