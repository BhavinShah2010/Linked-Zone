<?php
	require_once ('session.php');
	require_once ('config.php');
	try
	 {
			$id   = addslashes ($_REQUEST ['u_name']);
			$pass = addslashes ($_REQUEST ['u_pass']);
			//$sql = "SELECT * FROM user_reg_tb WHERE user_id = '$id' ,  password = '$pass' AND block_status = 1";
			$sql = "SELECT * FROM user_reg_tb WHERE user_id = '$id' AND password = '$pass'";
			
			$result =  mysqli_fetch_array (mysqli_query ($con , $sql));
	
			if (!empty ($result))					
			 {
				if($result["user_block_status"] == 1)
				{
					echo "2"; // blocked user
				}
				
				else if($result["approve_status"] == 0)
				{
					echo "3";
				}
				
				
				else if($result["approve_status"] == 2)
				{
					echo "4";
				}
				else if($result["user_del_status"]==1)
				{
					echo "5";
				}
				
				else
				{
					$cuser = $_SESSION ['user_id'] = $result['pattern_id'];
					$_SESSION ['f_name'] = $result['first_name'];
					$_SESSION ['l_name'] = $result['last_name'];
					
					$sql = "UPDATE user_reg_tb SET login_status = 1 WHERE pattern_id = '$cuser'";										
					mysqli_query ($con,$sql);
					$_SESSION ['user_online_status'] = $result['on_off_user_status'];
	//				$_SESSION ['on_off_flag'] = $result['on_off_status'];				
	//				$_SESSION ['on_off_user_flag'] = $result['on_off_user_status'];
					echo "0";
				}
				mysqli_close ($con);
			 }	 
			else
			 echo "1";
		 }

	catch (Exception $e)
	 {
		 echo "PROBLEM OCCURED SORRY!!!";
	 }
?>