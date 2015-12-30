<?php
	require_once ('session.php');
//	include ('classes/auto_load_class.php');	
	include_once ('classes/class.user.php');
	$contents = addslashes(str_replace("\n", '<br/>', $_REQUEST["postVal"]));
	$post_type = $_REQUEST['p_type'];
	$file = $_REQUEST ['file'];
	$date = date('Y/m/d H:i:s');
	$user_type = $_REQUEST ['u_type'];
	$user = new User ($_SESSION['user_id'] , $user_type);
	$user->user_add_post ($post_type , $contents , $file , $date);
	unset ($user);
?>