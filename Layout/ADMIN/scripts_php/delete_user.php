<?php

/*---------------------------------------DELETE THE USER-------------------------------------------------- */
	require_once('session.php');
	require_once('config.php');
	
	$users = explode("#", $_POST['users']);
	
	for($i=0;$i<count($users);$i++)
	{
		if($users[$i]!="")
		{
			
			mysqli_query($con,"UPDATE user_reg_tb SET user_del_status = 1   WHERE  pattern_id=".$users[$i]);
			//mysqli_query($con , "UPDATE user_reg_tb set block_status = 0 where pattern_id=".$users[$i] );
		}
	}
	
	die("success");
	
?>		