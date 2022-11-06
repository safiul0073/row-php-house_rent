
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

if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $house = $db->query("SELECT * FROM houses where id = '$edit_id'")->fetch_assoc();
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $db->query("DELETE FROM houses where id = '$delete_id'");
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
    <title>Dashboard</title>
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
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    
    <div class="row mx-4 py-4">
        <div class="col-md-4 ">
            <form action="dashboard.php" method="post" enctype="multipart/form-data" class="w-100">
                <input type="hidden" name="id" value="<?php echo isset($house['id']) ? $house['id'] : ''; ?>">
                <div class="from-group">
                    <label for="house_name">House Name</label>
                    <input type="text" id="house_name" name="house_name" value="<?php echo isset($house['house_no']) ? $house['house_no'] : ''; ?>" require class="form-control">
                </div>
                <div class="form-group">
                    <label >Category</label>
                    <select name="category_id" id="" class="custom-select" required>
                        <?php 
                        if (!isset($_SESSION['username'])) {
                            $_SESSION['msg'] = "You must log in first";
                            header('location: login.php');
                        }
                        $categories = $db->query("SELECT * FROM categories order by name asc");
                        if($categories->num_rows > 0):
                        while($row= $categories->fetch_assoc()) :
                        ?>
                        <option <?php echo (isset($house['category_id']) && $house['category_id'] ==  $row['id']) ? 'selected' : ''; ?> value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <option selected="" value="" disabled="">Please check the category list.</option>
                    <?php endif; ?>
                    </select>
                </div>
                <div class="from-group">
                    <label for="flat">Flat</label>
                    <input type="number" id="flat" value="<?php echo isset($house['flat']) ? $house['flat'] : ''; ?>" name="flat" require class="form-control">
                </div>
                <div class="from-group">
                    <label for="unit">Unit</label>
                    <input type="text" id="unit" value="<?php echo isset($house['unit']) ? $house['unit'] : ''; ?>" name="unit" require class="form-control">
                </div>
                <div class="from-group">
                    <label for="images">Image</label>
                    <input type="file" id="images" multiple name="images[]" class="form-control">
                </div>
                <div class="from-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo isset($house['description']) ? $house['description'] : ''; ?></textarea>
                </div>
                <div class="from-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" value="<?php echo isset($house['price']) ? $house['price'] : ''; ?>" require class="form-control">
                </div>
                <div class="from-group">
                    <label for="is_garage">Garage</label>
                    <select class="form-control" name="is_garage" id="">
                        <option <?php echo isset($house['isGarage']) && $house['isGarage'] == 1? 'selected' : ''; ?> value="1">Yes</option>
                        <option <?php echo isset($house['isGarage']) && $house['isGarage'] == 0 ? 'selected' : ''; ?> value="0">No</option>
                    </select>
                </div>
                <div class="form-group py-4">
                    <button type="submit" class="btn btn-block btn-success" name="house_save" >Submit</button>
                </div>
            </form>
        </div>

        <!-- table -->
        <div class="col-md-8">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">House</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $username = $_SESSION["username"];
                    $user = $db->query("SELECT * FROM users where username = '$username'")->fetch_assoc();
                    $user_id = $user['id'];
                    $i = 1;
                    $house = $db->query("SELECT h.*,c.name as cname FROM houses h inner join categories c on c.id = h.category_id where h.owner_id = '$user_id' order by id asc");
                    while($row=$house->fetch_assoc()):
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td class="">
                            <p>House #: <b><?php echo $row['house_no'] ?></b></p>
                            <p><small>House Type: <b><?php echo $row['cname'] ?></b></small></p>
                            <p><small>Price: <b><?php echo number_format($row['price'],2) ?></b></small></p>
                        </td>
                        <td>
                            <img src="../assets/uploads/<?php echo $row['image'] ? explode(',', $row['image'])[0] : '' ?>" height="80" width="100" alt="...">
                        </td>
                        <td class="text-center">
                        <?php
                            if ($row['is_selled'] == 1) {
                                echo '<span class="badge badge-pill badge-success">Own</span>';
                            }else if ($row['is_selled'] == 2) {
                                echo '<span class="badge badge-pill badge-warning">Pending</span>';
                            }else {
                                echo '<span class="badge badge-pill badge-danger">Accepted</span>';
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-primary" href="dashboard.php?edit_id=<?php echo $row['id'] ?>" >Edit</a>
                            <a class="btn btn-sm btn-danger" href="dashboard.php?delete_id=<?php echo $row['id'] ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
			</table>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>