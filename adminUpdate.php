<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql="select * from `customer` where customerId=$id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$firstName=$row['firstName'];
$lastName=$row['lastName'];
$email=$row['email'];
$houseNo = $row['houseNo'];
$streetName = $row['streetName'];
$city = $row['city'];
$postCode = $row['postCode'];
$phone = $row['phone'];
$password = $row['password'];

if(isset($_POST ['submit'])){
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $houseNo = $_POST['houseNo'];
  $streetName = $_POST['streetName'];
  $city = $_POST['city'];
  $postCode = $_POST['postCode'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $sql = "update `customer` set customerId=$id, firstName='$firstName', lastName = '$lastName',
  email='$email', phone='$phone', password='$password', houseNo='$houseNo', streetName='$streetName', city='$city', postCode='$postCode' where customerId=$id";
  $result = mysqli_query($con, $sql);
  if($result){
    //echo "Data updated successfully";
    header('location:adminPanel.php');
    }
    else {
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
  <div class="container my-5">
    <form method="post">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" placeholder="Enter your first name " name="firstName" autocomplete="off" value=<?php echo $firstName; ?>>
      </div>

      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" placeholder="Enter your last name " name="lastName" autocomplete="off" value=<?php echo $lastName; ?>>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Enter your email " name="email" autocomplete="off" value=<?php echo $email; ?>>
      </div>

      <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" placeholder="Enter your phone number " name="phone" autocomplete="off" value=<?php echo $phone; ?>>
      </div>

      <div class="form-group">
        <label>House Number</label>
        <input type="text" class="form-control" placeholder="Enter your house number " name="houseNo" autocomplete="off" value=<?php echo $houseNo; ?>>
      </div>

      <div class="form-group">
        <label>Street Name</label>
        <input type="text" class="form-control" placeholder="Enter your street name " name="streetName" autocomplete="off" value=<?php echo $streetName; ?>>
      </div>

      <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" placeholder="Enter your city " name="city" autocomplete="off" value=<?php echo $city; ?>>
      </div>

      <div class="form-group">
        <label>Post Code</label>
        <input type="text" class="form-control" placeholder="Enter your post code " name="postCode" autocomplete="off" value=<?php echo $postCode; ?>>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" placeholder="Enter your password: " name="password" autocomplete="off" value=<?php echo $password; ?>>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>

</body> 