<?php
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	$date = date('Y/m/d H:i:s');	
	$content = $_REQUEST['cmnt'];
	$post_id = $_REQUEST['post_id'];
	$sql = "INSERT INTO comment_tb (post_id , comment_content  time_of_comment) Values
		 ('', '$contents' , '$date')" or die ("prbs");
	$result = mysqli_query ($con ,$sql);	
	if ($result)
		 {
			$result = mysqli_fetch_array(
						mysqli_query($con,"SELECT comment_id from comment_tb where time_of_comment = '$date'"));
			$comment_id = $result['post_id'];
			$result = mysqli_query ($con,"INSERT INTO user_post_comment_tb (post_id ,comment_id, pattern_id) VALUES 
				('post_id' ,  '$comment_id' , '$cuser')");
		 }
		else
		 die (mysqli_error ());
	
	
?>
