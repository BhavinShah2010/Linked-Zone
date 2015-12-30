<?php
	// will update like counter in database
	
	require ('config.php');
	session_start ();
	$post_id = $_REQUEST['post_id'];
	$likes = $_REQUEST['likes'];
	echo $_SESSION['user_id'];	


	

?>