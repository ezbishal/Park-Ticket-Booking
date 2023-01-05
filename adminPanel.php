<?php
session_start();
include 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mellodian Community Park</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="text-center">
  <h1>Welcome, <?php echo $_SESSION['firstName']; ?></h1>
  </div>

<div class="container">

<button class="btn btn-primary my-5"><a href="customerRegistration.php" class="text-light">Add Customer</a></button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">UserID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">houseNo</th>
      <th scope="col">streetName</th>
      <th scope="col">city</th>
      <th scope="col">postCode</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>

    </tr>
  </thead>
  <tbody>

  <?php

    $sql = "select * from `customer`";
    $result = mysqli_query($con, $sql);
    if($result){

        while($row=mysqli_fetch_assoc($result)){
            $id = $row['customerId'];
            $firstName = $row['firstName'] ;
            $lastName = $row['lastName'] ;
            $email = $row['email'];
            $phone = $row['phone'];
            $houseNo = $row['houseNo'];
            $streetName = $row['streetName'];
            $city = $row['city'];
            $postCode = $row['postCode'];
            $password = $row['password'];
            
            echo '
            <tr>
              <th scope="row">'.$id.'</th>
              <td>'.$firstName.'</td>
              <td>'.$lastName.'</td>
              <td>'.$email.'</td>
              <td>'.$phone.'</td>
              <td>'.$houseNo.'</td>
              <td>'.$streetName.'</td>
              <td>'.$city.'</td>
              <td>'.$postCode.'</td>
              <td>'.$password.'</td>
              <td>
              <button class="btn btn-primary"><a href="adminUpdate.php? updateid='.$id.'" class="text-light">Update</a></button>
              <button class="btn btn-danger"><a href="adminDelete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
              </td>
            </tr>';
        }
    }

?>
 
  </tbody>
</table>

</div>

</body>
</html>

