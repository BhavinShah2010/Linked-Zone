<?php
	require_once ('session.php');
	include ('classes/class.user.php');
	$post_id = $_REQUEST['del_p_id'];
	$type = $_REQUEST['type'];
	$u_type = $_REQUEST['u_type'];
	$user = new User ($_SESSION['user_id'] , $u_type);
	$user -> user_del_post ($post_id , $type);

	
	unset ($user);
?>