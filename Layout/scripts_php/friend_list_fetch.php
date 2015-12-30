<?php
	/*------------------- WILL FETCH THE FRIEND OF USER -------------------------*/
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_REQUEST['user_id'];
	$text = '';

	$sql = "SELECT * from user_reg_tb WHERE pattern_id IN(SELECT fpattern_id FROM user_friends_tb WHERE pattern_id = '$cuser')";
	$result_friends = mysqli_query ($con,$sql);
/*	if (!$check1_res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}*/
	  			 while ($re_of_friends = mysqli_fetch_array ($result_friends))
					{
						
							 $text .= '<li>';
							 $text .= '<a href="profile.php?profile_user='.$re_of_friends['pattern_id'].'">';
							 $text .= '<div class="searched_person_cnt">';
							 $text .= '<div class="searched_person_pic">';
							 $text .= ' <img src="all_user_img/user_'.$re_of_friends['pattern_id'].'/profile_pic.jpg" /></div>';
							 $text .= '<div class="searched_person_det">';
							 $text .= '<span>'.$re_of_friends['first_name'].' ' .$re_of_friends['last_name'].'</span>';
							 $text .= '</div>';
							 $text .= '</div>';
							 $text .= '</a>';
							 $text .= '</li>';
							 
						 
				 
					 }
	if ($text == '')
		echo "No Friends";
	else
		echo $text;
			 
?>