<?php 
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql="delete from `customer` where customerId=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Deleted successfully";
        header('location:adminPanel.php');
    }
    else {
        die(mysqli_error($con));
    }
}


?>