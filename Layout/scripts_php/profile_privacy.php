<?php
	require_once('session.php');
	require_once('config.php');
	
	$select_val = $_POST['value'];
//	echo $select_val;
	// 1 for Only Me
	// 2 for Friends 
	// 3 for Friends Of Friends

	$sql = mysqli_query($con,"UPDATE user_reg_tb set privacy_status = '".$select_val."' WHERE pattern_id = '".$_SESSION['user_id']."'");
//	echo $sql;

?>
