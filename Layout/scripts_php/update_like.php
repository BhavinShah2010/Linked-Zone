<?php
	/*------------------- WILL UPDATE LIKE COUNTER OF POST -------------------------*/
	
	require_once ('session.php');
	require_once ('config.php');
	
	$cuser = $_SESSION['user_id'];
	$post_id = $_REQUEST['post_id'];
	$sql = "SELECT * FROM post_tb WHERE post_id = '$post_id'";
		   
	$re_posts = mysqli_fetch_array (mysqli_query ($con , $sql));			
	
 	$like_cnt = $re_posts['post_like_counter'];

		
	echo $like_cnt;
?>