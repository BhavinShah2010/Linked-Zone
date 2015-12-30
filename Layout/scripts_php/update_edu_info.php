<?php
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	
	$roll_no = $_REQUEST['roll_no'];
	$school_name = $_REQUEST['school_name'];
	$clg_name = $_REQUEST['clg_name'];
	$stream = $_REQUEST['stream'];
	$clg_year = $_REQUEST['clg_year'];
	
	$sql = mysqli_query($con , "UPDATE user_education_tb SET school_name = '".$school_name."' , clg_name = '".$clg_name."' , 		  						stream = '".$stream."' , clg_year = '".$clg_year."' WHERE pattern_id = '".$cuser."'")
						 or die(mysqli_error($con));
						 
	$query = mysqli_query($con , "UPDATE user_reg_tb SET enrollment_no = '".$roll_no."' WHERE pattern_id = '".$cuser."'") or die(mysqli_error($con)); 
	
	?>