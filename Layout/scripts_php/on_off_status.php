<?php 
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	$text = '';
	$sql = "SELECT pattern_id ,first_name FROM user_reg_tb WHERE pattern_id IN 
			(SELECT fpattern_id FROM user_friends_tb WHERE pattern_id = '$cuser') AND login_status = 1 AND on_off_user_status = 1";
	$result = mysqli_query($con,$sql);
	while ($result1 = mysqli_fetch_array ($result))
		{
//			echo $result1['first_name'].' '.$result1['pattern_id'];
	        $text .= '<div class="btn">';
	        $text .= '	<a href="#">';
	        $text .= '		<div class="b_icon" style="background:url(all_user_img/user_'.$result1['pattern_id'].'/profile_pic.jpg); background-size:100% 100%"></div>';
	        $text .= '		<div class="b_type">'.$result1['first_name'].'</div>';
			$text .= '	</a>';
			$text .= '</div>';

		}
	echo $text;
	
	if (!$result)
	 {
		mysql_error (die ('Something is Going Wrong!!!'));
	 }
	mysqli_close ($con);
?>
