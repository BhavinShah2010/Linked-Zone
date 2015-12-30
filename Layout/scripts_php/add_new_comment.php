<?php
	require_once ('session.php');
	include ('classes/class.user.php');
	$post_id = $_REQUEST['post_id'];
	$content = $_REQUEST['cmt_cnt'];
	$u_type  = $_REQUEST ['u_type'];
	$content = trim(preg_replace('/\s\s+/', ' ', $content));
	$user = new User ($_SESSION['user_id'] , $u_type);
	$user -> user_add_comment ($post_id , $content);
?>