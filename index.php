
<?php
session_start();

    include 'connect.php';
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from `customer` where email = '$email' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_assoc($result);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){
            $_SESSION = $row;
            header("location: customerPanel.php");
        }  
        else{  
            echo  "Invalid Username or Password";
        }     
    }
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
</head>



<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#" text-color="orange">Mellodian Community Park</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminLogin.php">Admin Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container my-5">

    <button class="btn btn-primary">Login</button>
    <button class="btn btn-primary"><a href="customerRegistration.php" class="text-light">Register</a></button>

  </div>
  <div class="container my-5">
    <form method="post">
      <div class="form-group">
        <label for="email">Email address</label>
        <input name="email" type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="width: 300px;">

      </div>
      <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" required class="form-control" id="exampleInputPassword1" placeholder="Password" style="width: 300px;">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Log In</button>
    </form>
  </div>

</body>

</html>