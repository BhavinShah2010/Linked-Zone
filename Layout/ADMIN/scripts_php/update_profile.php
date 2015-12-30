<?php 
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	
	$first_name = $_POST['first_name'];
	$last_name  = $_POST['last_name'];
	$pass       = $_POST['pass'];
//	echo $pass;
	$sql    = mysqli_query($con , "SELECT * from admin_login_tb where pattern_id ='".$cuser."'");// AND password = '".$pass."'");
    $result = mysqli_fetch_array($sql);
	
	if ($result['password'] == $pass)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
	
	$sql =  mysqli_query($con , "UPDATE admin_login_tb SET first_name = '".$first_name."' , last_name = '".$last_name."' WHERE pattern_id = '".$cuser."'" );
		
		
		
		
/*if (!empty($result))					
			 {
				 $password  = $_POST['new_password'];
				 mysqli_query($con , "UPDATE admin_login_tb set password = $password , first_name = $first_name and last_name = $last_name WHERE  pattern_id = $cuser");
				echo "0";
				mysqli_close($con);
			 }	
			 
			 else
			 {
				 echo "1";
			 } 
	*/	
?>






