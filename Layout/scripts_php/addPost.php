<?php
	/*------------------- WILL ADD NEW POST -------------------------*/
	require_once('session.php');
//	require_once('config.php');

	include ('classes/class.user.php');	

	$contents = addslashes(str_replace("\n", '<br/>', $_REQUEST["postVal"]));
	$post_type = $_REQUEST['type'];
	$date = date('Y/m/d H:i:s');
	$img = $_REQUEST['img'];
	$user_type = $_REQUEST['u_type'];
	$user = new User ($_SESSION['user_id'] , $user_type);
	$user->user_add_post ($post_type , $contents , $img , $date);

	unset ($user);
	
/*	$sql = "INSERT INTO post_tb (post_id , post_type , post_text_content , post_img_content , time_of_post, post_like_counter) Values
		 ('','$post_type'  , '$contents' , 'NULL' , '$date', '0')" or die ("prbs");
	$result = mysqli_query ($con ,$sql);	
	
	if ($result)
		 {
			$result = mysqli_fetch_array(
						mysqli_query($con,"SELECT post_id from post_tb where time_of_post = '$date'"));
			$post_id = $result['post_id'];
			$user_id = $_SESSION['user_id'];

			$result = mysqli_query ($con,"INSERT INTO user_post_tb (pattern_id , post_id) VALUES 
				('$user_id' ,  '$post_id')");
				if ($result)
					echo $post_id;
				else
				 die (mysqli_error ());
		 }
		else
		 die (mysqli_error ());*/
?>