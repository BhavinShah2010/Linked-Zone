<?php
	require_once ('session.php');
	require_once ('config.php');
	$cuser = $_SESSION['user_id'];
	$text = '';
	$sql = "SELECT post_img_content FROM post_tb WHERE post_id IN 
			(SELECT post_id FROM user_post_tb WHERE pattern_id = '$cuser') AND post_type = 0";
	$result = mysqli_query ($con , $sql);
	if ($result)
		{
			while ($row = mysqli_fetch_array ($result))
			 {
				 $text .= '<div class="img_bx">'.
				 		  '	<img src="all_user_img/user_'.$cuser.'/'.$row['post_img_content'].'"/>'.
                   		  '</div><!-- img_bx -->';

			 }
		}
	if ($text == '')
		{
			$text .= '<div class="no_imgs">No Images</div>';
		}


		echo $text;
	mysqli_close ($con);

?>