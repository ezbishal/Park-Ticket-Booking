<?php
session_start();

include 'connect.php';

if (isset($_POST['submit'])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $houseNo = $_POST['houseNo'];
  $streetName = $_POST['streetName'];
  $city = $_POST['city'];
  $postCode = $_POST['postCode'];
  $password = $_POST['password'];

  $sql = "insert into `customer` (firstName, lastName, email, phone, houseNo, streetName, city, postCode, password) 
  values('$firstName', '$lastName', '$email', '$phone', '$houseNo','$streetName', '$city', '$postCode','$password')";
  $result = mysqli_query($con, $sql);


  if ($result) {
    //echo "Data inserted successfully";
    header('location:index.php');
  } else {
    die(mysqli_error($con));
  }
}



?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

  <title>Mellodian Community Park</title>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#" text-color="orange">Mellodian Community Park</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <!-- <li class="nav-item active"> -->
        <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Admin Login</a>
      </li> -->
    </ul>
  </div>
</nav>



  <div class="container my-5">
    <form method="post">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" required placeholder="Enter your first name " name="firstName" autocomplete="off" style="width: 300px;">
      </div>

      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" required placeholder="Enter your last name " name="lastName" autocomplete="off" style="width: 300px;">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" required placeholder="Enter your email " name="email" autocomplete="off" style="width: 300px;">
      </div>

      <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" required placeholder="Enter your phone number " name="phone" autocomplete="off" style="width: 300px;">
      </div>

      <div class="form-group">
        <label>Address</label>
      </div>
      <div class="form-group form-inline">
        <input type="text" class="form-control mr-5" required placeholder="House Number" name="houseNo" autocomplete="off" style="width: 150px;">
        <input type="text" class="form-control mr-5" required placeholder="Street name " name="streetName" autocomplete="off" style="width: 150px;">
        <input type="text" class="form-control mr-5" required placeholder="City " name="city" autocomplete="off" style="width: 150px;">
        <input type="text" class="form-control mr-5" required placeholder="Post Code " name="postCode" autocomplete="off" style="width: 150px;">
      </div>

      <div class="form-group">
        <label>Upload photo</label>
        <input type="file" class="form-control" name="customerPhoto" style="width: 300px;"/>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" required placeholder="Enter password " name="password" autocomplete="off" style="width: 300px;">
      </div>

      <button type="submit" class="btn btn-primary" required name="submit">Submit</button>
    </form>
  </div>

</body>