<?php
	require_once ('session.php');
	require_once ('config.php');

	$post_id 	= $_REQUEST['post_id'];
	$cuser		= $_SESSION['user_id'];
	$sql = "SELECT pattern_id FROM user_post_tb where post_id = '$post_id'";
	
	
	$result = mysqli_fetch_array (mysqli_query ($con , $sql));
	$post_owner = $result['pattern_id'];
	if ($post_owner != $cuser)
	 {
		$sql = "INSERT INTO user_like_noti_tb VALUES ('$cuser' , '$post_id')";
//		mysqli_query ($con , $sql);
//		echo $_REQUEST['string'];
		
//		$sql = "UPDATE notification_tb SET "
	 }
?>