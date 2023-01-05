<?php

$con=new mysqli('localhost', 'root', '', 'ticketbooking');

if(!$con){
    die(mysqli_error($con));
}


?>