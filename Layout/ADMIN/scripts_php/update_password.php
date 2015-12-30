<?php 
	require_once ('session.php');
	require_once ('config.php');
	
	$cuser = $_SESSION['user_id'];
	$pass  = $_POST['new_password'];
	
	$sql = mysqli_query($con , "UPDATE admin_login_tb SET password = '".$pass."' WHERE pattern_id = '".$cuser."'" ) ;
    mysqli_close ($con);
	
?>






