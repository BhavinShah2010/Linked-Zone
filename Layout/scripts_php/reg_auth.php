<?php
	require_once ('session.php');
//	session_start ();
	require_once ('config.php');
			$id   = addslashes ($_REQUEST ['u_name']);
			$sql = "SELECT * FROM user_reg_tb WHERE pattern_id = '$id'";
			$result =  mysqli_fetch_array (mysqli_query ($con , $sql));
	
			if (!empty ($result))					
			 {
				$cuser =  $result['pattern_id'];
				$_SESSION ['f_name'] = $result['first_name'];
				$_SESSION ['l_name'] = $result['last_name'];
			 	$sql = "UPDATE user_reg_tb SET on_off_status = 1 WHERE pattern_id = '$cuser'";										
				mysqli_query ($con,$sql);
				$_SESSION ['user_online_status'] = $result['on_off_user_status'];
//				$_SESSION ['on_off_flag'] = $result['on_off_status'];				
//				$_SESSION ['on_off_user_flag'] = $result['on_off_user_status'];
                echo "0";
				?>	
                	<script  type="text/javascript">
						window.location.replace ('../index.php');
					</script>
                   
                <?php
				mysqli_close ($con);
			 }	 
			else
			 echo "1";
?>