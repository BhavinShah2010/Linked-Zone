<?php
	require_once ('session.php');
	include ('classes/class.user.php');	
	
	$about_report = addslashes(str_replace("\n", '<br/>', $_REQUEST["postVal"]));
	$report_type  = $_REQUEST['report_type'];
	$report_name  = $_REQUEST ['file'];
	$report_time  = date('Y/m/d H:i:s');
	$user_type    = $_REQUEST ['u_type'];
	$for_year     = $_REQUEST['for_year'];
	
	$obj_report = new report ();
	$obj_report->set_owner_report ($_SESSION['user_id']);
//	$user = new User ($_SESSION['user_id'] , $user_type);
	$obj_report->set_report_value ($report_type , $report_name , $about_report , $report_time , $for_year);
	$obj_report->add_report();
//	$user->user_add_post ($post_type , $contents , $file , $date);
	unset ($obj_report);
?>