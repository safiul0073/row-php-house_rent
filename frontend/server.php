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

  	header('location: login.php');
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


if (isset($_POST['purches_house'])) {
  
  $house_id = mysqli_real_escape_string($db, $_POST['house_id']);
  $house = $db->query("SELECT id, price, owner_id FROM houses  WHERE id = '$house_id'")->fetch_assoc();
  $username = $_SESSION['username'];
  $user = $db->query("SELECT id,username FROM users  WHERE username = '$username'")->fetch_assoc();
  $price = $house['price'];
  $user_id = $user['id'];
  $owner_id = $house['owner_id'];

  $query = "INSERT INTO purches (house_id, seller_id, user_id, price) 
  VALUES('$house_id', '$owner_id', '$user_id', '$price')";
  mysqli_query($db, $query);
  $data = " is_selled = '1' ";
  $data .= ", owner_id = '$user_id'";
  $db->query("UPDATE houses set $data where id = $house_id");
  $_SESSION['success'] = "Succefully Purchesed";
  
}

if (isset($_POST['house_save'])) {
  $username = $_SESSION["username"];
  $user = $db->query("SELECT * FROM users where username = '$username'")->fetch_assoc();
  $user_id = $user['id'];
  extract($_POST);
		$data = " house_no = '$house_name' ";
		$data .= ", description = '$description' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", flat = '$flat' ";
		$data .= ", unit = '$unit' ";
		$data .= ", price = '$price' ";
    $data .= ", isGarage = '$is_garage' ";
    $data .= ", is_selled = '2' ";
    $data .= ", owner_id = '$user_id ' ";

		if( count($_FILES['images']) > 0 ){
			$image_names = '';
			$uploads_dir = '../assets/uploads';
			foreach ($_FILES["images"]["error"] as $key => $error) {
				if ($error == UPLOAD_ERR_OK) {
					$tmp_name = $_FILES["images"]["tmp_name"][$key];
					$name = strtotime(date('y-m-d H:i')).'_'.basename($_FILES["images"]["name"][$key]);
					move_uploaded_file($tmp_name, "$uploads_dir/$name");
					$image_names .= $name.',';
				}
			}
			$data .= ", image = '$image_names' ";
		
		}

			if(empty($id)){
				$save = $db->query("INSERT INTO houses set $data");
			}else{
				$save = $db->query("UPDATE houses set $data where id = $id");
			}
		if($save)
			return 1;
}


if (isset($_POST['update_owner'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $image = null;
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  $data = " name = '$name' ";
  $data .= ", email = '$email' ";
  $data .= ", username = '$username' ";
  if ($password) {
    $data .= ", password = '$password' ";
  }
  if( $_FILES['image']["name"]){
      $uploads_dir = '../assets/uploads';
      $tmp_name = $_FILES["image"]["tmp_name"];
      $name = strtotime(date('y-m-d H:i')).'_'.basename($_FILES["image"]["name"]);
      move_uploaded_file($tmp_name, "$uploads_dir/$name");
      $data .= ", avater = '$name' ";
    }
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database
    $db->query("UPDATE users set $data where id = $id");
  }
}

?>