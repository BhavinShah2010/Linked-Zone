<?php
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	
	
	$contact = $_REQUEST['contact'];
	
	$sql = mysqli_query($con , "UPDATE user_security_tb SET phono_no = '".$contact."' WHERE pattern_id = '".$cuser."'")
						 or die(mysqli_error($con));
						 
	
	
	?>