<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "registration";
$con = mysqli_connect ($server , $user , $pass) or die ("PROBLEM IN CONNECTING SERVER"); 
mysqli_select_db ($con,$database) or die ("PROBLEM IN SELECTING DATABASE");

?>