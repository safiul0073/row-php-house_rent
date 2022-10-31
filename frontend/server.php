<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost','root','','house_rental_db');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (name, email, phone, username, password, type) 
  			  VALUES('$name', '$email', '$phone', '$username', '$password', 2)";
  	mysqli_query($db, $query);

  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
// contact USER
if (isset($_POST['contuct_user'])) {
  echo "Contact info";
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $details = mysqli_real_escape_string($db, $_POST['feedback']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($email)) {
  	array_push($errors, "Email is required");
  }

  if (count($errors) == 0) {
  	
  	$query = "INSERT INTO contacts (username, email, details) 
  			  VALUES('$username', '$email', '$details')";
  	mysqli_query($db, $query);
    $_SESSION['success'] = "Succefully send info!";
  	header('location: contact.php');
  	
  }
}

// contact USER
if (isset($_POST['store_product'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $size = mysqli_real_escape_string($db, $_POST['size']);
  $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $image = null;
  if (!empty($_FILES["image"]["name"])) {
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        // Allow certain file formats 
        // $allowTypes = array('jpg','png','jpeg','gif'); 
        // if(in_array($fileType, $allowTypes)){
            $image = $_FILES['image']['tmp_name']; 
            $image = addslashes(file_get_contents($image)); 
        // }
  }
  if (empty($name)) {
  	array_push($errors, "Product Name is required");
  }
  if (empty($category)) {
  	array_push($errors, "Category is required");
  }

  if (count($errors) == 0) {
  	
  	$query = "INSERT INTO products (name, category, size, quantity, price, image) 
  			  VALUES('$name', '$category', '$size', '$quantity', '$price', '$image')";
  	mysqli_query($db, $query);
  	header('location: product.php');
  	
  }
}
// update_product
if (isset($_POST['update_product'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $size = mysqli_real_escape_string($db, $_POST['size']);
  $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $id = mysqli_real_escape_string($db, $_POST['id']);
  if (!$id) return array_push($errors, "Select Id");
  $image = null;
  if (!empty($_FILES["image"]["name"])) {
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        // Allow certain file formats 
        // $allowTypes = array('jpg','png','jpeg','gif'); 
        // if(in_array($fileType, $allowTypes)){
            $image = $_FILES['image']['tmp_name']; 
            $image = addslashes(file_get_contents($image)); 
        // }
  }
  if (empty($name)) {
  	array_push($errors, "Product Name is required");
  }
  if (empty($category)) {
  	array_push($errors, "Category is required");
  }

  if (count($errors) == 0) {
  	
  	$query = "UPDATE products set name='$name', category='$category', size='$size', quantity='$quantity', price='$price', image='$image' where id='$id'";
  	mysqli_query($db, $query);
  	header('location: product.php');
  	
  }
}

if (isset($_POST['purches_house'])) {
  
}

?>