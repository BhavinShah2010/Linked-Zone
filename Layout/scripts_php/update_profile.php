<?php 
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	
	$fname =  $_POST['fname'];
	$lname =  $_POST['lname'];
	$sql = mysqli_query ($con,"UPDATE user_reg_tb set first_name  = '$fname' , last_name = '$lname' where pattern_id = '".$cuser."' ");
	/*$sql1 = mysqli_query($con , "SELECT email_id FROM user_reg_tb where pattern_id =  '".$cuser."' ");
	
	while($row = mysqli_fetch_array($sql1))
	{
		echo $row['user_id'];
	}*/
	mysqli_close ($con);
	
	die("success");
?>