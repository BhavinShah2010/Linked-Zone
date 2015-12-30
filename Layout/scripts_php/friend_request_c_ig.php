<?php
	require_once ('session.php');
	require_once ('config.php');
	$val = $_REQUEST['val'];
	$user = $_REQUEST['user'];
	$fuser = $_REQUEST['fuser'];
//	echo $fuser;
	if ($val == 1)
	 {
		 $sql = "INSERT INTO user_friends_tb values ('$user' , '$fuser')";
		 $result = mysqli_query ($con,$sql);
		 $sql = "INSERT INTO user_friends_tb values ('$fuser' , '$user')";
		 $result = mysqli_query ($con,$sql);
		 
		 $sql = "DELETE FROM user_friend_req_tb WHERE pattern_id = '$fuser' AND fpattern_id='$user'";
		 $result = mysqli_query ($con,$sql);

	 }
	else
	 {
		 $sql = "DELETE FROM user_friend_req_tb WHERE pattern_id = '$fuser' AND fpattern_id='$user'";
		 $result = mysqli_query ($con,$sql);
	 }


		 ?>
         <script type="text/javascript">
		 				window.location.replace ('../friend_requests.php');
		 </script>
         <?php
?>