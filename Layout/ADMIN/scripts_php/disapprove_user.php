<?php

/*---------------------------------------BLOCK THE USER-------------------------------------------------- */
	require_once('session.php');
	require_once('config.php');
	
	$users = explode("#", $_POST['users']);
	
	for($i=0;$i<count($users);$i++)
	{
		if($users[$i]!="")
		{
			
			//mysqli_query($con,"delete from user_reg_tb where pattern_id=".$users[$i]);
			mysqli_query($con , "UPDATE user_reg_tb SET approve_status = 2 where pattern_id=".$users[$i] );
		}
	}
	
	die("success");
	
?>		