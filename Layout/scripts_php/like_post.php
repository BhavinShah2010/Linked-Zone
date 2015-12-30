<?php

	// will update like counter in database
	
	require ('config.php');
	session_start ();
	
	$post_id = $_REQUEST['post_id'];
	$cuser = $_SESSION['user_id'];
	$sql = mysqli_query ($con,"SELECT * FROM post_tb WHERE post_id = '$post_id' ORDER BY post_id");	
	$re_post = mysqli_fetch_array ($sql);
	$likes = $re_post['post_like_counter'];

	$sql = mysqli_query ($con,"SELECT * FROM user_post_liked_tb WHERE  fpattern_id = '$cuser' AND post_id = '$post_id'") or die (mysqli_error ());
	$re_post_like = mysqli_fetch_array ($sql);
	
	if (mysqli_num_rows ($sql) > 0)
	 {

		$likes -= 1;
		$like_text = 'Like ('.$likes.')';		
		$sql = "UPDATE post_tb SET post_like_counter = '$likes' WHERE post_id = '$post_id'";
		$result = mysqli_query ($con,$sql) or die ('Unlike can`t be done');
		
		$sql = "DELETE FROM user_post_liked_tb WHERE fpattern_id = '$cuser' AND post_id = '$post_id'";
		mysqli_query ($con,$sql) or die ("PROBS");
	 }
	else
	 {
		$likes += 1; 
		$like_text = 'Unlike ('.$likes.')';
		
		$sql = "UPDATE post_tb SET post_like_counter = '$likes' WHERE post_id = '$post_id'";
		$result = mysqli_query ($con,$sql) or die ('Likes can`t be done');
		
		$sql = "INSERT INTO user_post_liked_tb (fpattern_id , post_id) VALUES ('".$_SESSION['user_id']."','$post_id')";
		mysqli_query ($con,$sql) or die ("PROBS");
	 }
	echo $like_text;
				



	

?>