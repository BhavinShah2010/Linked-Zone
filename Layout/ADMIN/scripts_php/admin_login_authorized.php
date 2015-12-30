<?php
	require_once ('session.php');
	require_once ('config.php');
	try
	 {
			$id   = addslashes ($_REQUEST ['admin_name']);
			$pass = addslashes ($_REQUEST ['admin_pass']);
			$sql = "SELECT * FROM admin_login_tb WHERE user_id = '$id' AND password = '$pass'";
			$result =  mysqli_fetch_array (mysqli_query ($con , $sql));
	
			if (!empty ($result))					
			 {
				$cuser = $_SESSION ['user_id'] = $result['pattern_id'];
				
				$_SESSION ['f_name'] = $result['first_name'];
				$_SESSION ['l_name'] = $result['last_name'];
				
				$sql = "UPDATE admin_login_tb SET login_status = 1 WHERE pattern_id = '$cuser'";										
				mysqli_query ($con,$sql);
				$_SESSION ['user_online_status'] = $result['login_status'];
//				$_SESSION ['on_off_user_flag'] = $result['on_off_user_status'];*/
                echo "0";
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