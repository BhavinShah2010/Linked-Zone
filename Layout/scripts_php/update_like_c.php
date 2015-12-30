<?php
	include ('session.php');
	include ('classes/class.user.php');	
	$post_id = $_REQUEST['post_id'];
	$flag = $_REQUEST['like_flag'];
	$like_cnt = $_REQUEST['post_likes'];
	$u_type = $_REQUEST['u_type'];
	$user = new User ($_SESSION['user_id'] ,$u_type);
	$user -> user_update_like ($post_id , $flag , $like_cnt , $_SESSION['user_id']);
	unset ($user);

?>