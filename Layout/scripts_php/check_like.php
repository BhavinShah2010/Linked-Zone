<?php
	/*------------------- WILL UPDATE LIKE COUNTER OF POST -------------------------*/
	
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	$sql = "SELECT post_id FROM user_post_tb WHERE pattern_id IN
		    (SELECT fpattern_id FROM user_friends_tb WHERE pattern_id = '$cuser') OR pattern_id = '$cuser' order by post_id ASC"; 
	$re_posts = mysqli_query ($con , $sql);			
	while ($result = mysqli_fetch_array ($re_posts))
	 {
		 	$post_id .= $result['post_id']. ' ';
	 }
		
	echo $post_id;
?>