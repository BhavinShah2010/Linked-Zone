<?php
	/*------------------- WILL SEARCH THE FRIEND OF USER -------------------------*/
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	$val = $_REQUEST['search_query'];
	$length = strlen ($val);
	$text = '';
	if ($length==0)
	{
		echo $text;
		return;
		
	}



				 $sql = "SELECT * from user_reg_tb WHERE pattern_id != '$cuser' AND privacy_status != '1'";
				 $result_friends = mysqli_query ($con,$sql);
	  			 while ($re_of_friends = mysqli_fetch_array ($result_friends))
					{
						
						 $re = startsWith($re_of_friends['first_name'].$re_of_friends['last_name'],$val);
						 if ($re == '')
						 	continue;
						 else
						  {
							 $text  = '<li>';
							 $text .= '<a href="profile.php?profile_user='.$re_of_friends['pattern_id'].'">';
							 $text .= '<div class="searched_person_cnt">';
							 $text .= '<div class="searched_person_pic" style="background-image:url(all_user_img/user_'.$re_of_friends['pattern_id'].'/profile_pic.jpg); background-size:100% 100%"></div>';
							 $text .= '<div class="searched_person_det">';
							 $text .= '<span>'.$re_of_friends['first_name'].' ' .$re_of_friends['last_name'].'</span>';
							 $text .= '</div>';
							 $text .= '</div>';
							 $text .= '</a></li>';
							 //$text .= '<a href="#"><div class="add_frn_btn">Want To Link?</div></a></li>';
							 echo $text;
						  }
				 
					 }
	if ($text == '')
		echo "No Result Found";
			 	
			 
function startsWith($haystack, $needle)
{
    return $needle === "" || stripos($haystack, $needle) === 0;
}	 
?>