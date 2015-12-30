<?php
	require_once ('session.php');
	include ('classes/class.user.php');
	$post_id = $_REQUEST['del_p_id'];
	$u_type = $_REQUEST ['u_type'];
	$user = new User ($_SESSION['user_id'] , $u_type);
	$user->fetch_all_post (); 
//	echo $user->p[0]->get_comment_cnt ();
//	$user -> user_fetch_comment ($post_id);
	
	unset ($user);


?>