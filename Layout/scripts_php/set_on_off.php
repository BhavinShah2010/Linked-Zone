<?php 
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	$flag =  $_REQUEST['on_off_flag'];
	
	$sql = "UPDATE user_reg_tb SET on_off_user_status = '$flag' WHERE pattern_id = '$cuser'";	

	$result = mysqli_query ($con,$sql);
	$_SESSION['user_online_status'] = $flag;
	mysqli_close ($con);
	
?>