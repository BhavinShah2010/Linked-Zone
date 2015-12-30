<?php
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	
	$skill = $_REQUEST['skill'];
	$hobby = $_REQUEST['hobby'];
	$interest = $_REQUEST['interest'];
	$nationality = $_REQUEST['nationality'];
	$dob = $_REQUEST['dob'];
	$gender = $_REQUEST['gender'];
	$marital_status = $_REQUEST['marital_status'];
	
	$query = mysqli_query($con , "UPDATE user_reg_tb SET  dob = '".$dob."' , gender = '".$gender."' WHERE pattern_id = '".$cuser."'");
	
	$sql = mysqli_query($con , "UPDATE user_personal_tb SET skill = '".$skill."' , hobbie = '".$hobby."' , interest = '".$interest."' , 		  						nationality = '".$nationality."' , rel_status = '".$marital_status."' WHERE pattern_id = '".$cuser."'")
						 or die(mysqli_error($con));
	
	?>