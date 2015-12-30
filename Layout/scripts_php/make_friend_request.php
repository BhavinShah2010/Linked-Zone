<?php
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	$friend_id = $_REQUEST['friend_id'];
	
	$sql = mysqli_query ($con,"INSERT INTO user_friend_req_tb values ('$cuser' , '$friend_id')");
	mysqli_close ($con);
?>