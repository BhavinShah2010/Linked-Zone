<?php
	include ('classes/class.user.php');
	$post_id = $_REQUEST['del_p_id'];
	$type = $_REQUEST['type'];
	$u_type = $_REQUEST['u_type'];
	$user = new User ($_REQUEST['user_id'] , $u_type);
	$user -> user_discard_report_post ($post_id , $type);
	unset ($user);
?>