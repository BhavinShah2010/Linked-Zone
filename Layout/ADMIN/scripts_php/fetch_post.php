<?php 
	session_start ();
	require('config.php');
	$post_user_id = $_REQUEST['post_user_id'];
	$post_id = $_REQUEST['post_id'];
	$post_owner = $_REQUEST['name'];
	$cuser = $_SESSION['user_id'];
	$cuser_name = $_SESSION['f_name'].' '.$_SESSION['l_name'];
	$img_path = "all_user_img/user_".$post_user_id;
	$sql = mysqli_query ($con,"SELECT * FROM post_tb WHERE post_id = '$post_id'");	
	$re_post = mysqli_fetch_array ($sql);
	$post_type = $re_post['post_type'];
	$post_content = $re_post['post_text_content'];	
	$post_img_content = $re_post['post_img_content'];
	$post_time = $re_post['time_of_post'];			
	$likes = $re_post['post_like_counter'];
	$sql = mysqli_query ($con,"SELECT * FROM user_post_liked_tb WHERE post_id = '$post_id' AND fpattern_id = '$cuser'") or die (mysqli_error ());
	$re_post_like = mysqli_fetch_array ($sql);
	if (mysqli_num_rows ($sql) > 0)
		{
    		$like_text = "Unlike";
		}
	else
	 	{
			$like_text = "Like"	;
		}
	if ($post_type == 1)
	
	$text =     '<div id = "main_post_container">'.
				'	<div class="post_owner_pic" style="background-image:url(all_user_img/user_'.$post_user_id.'/profile_pic.jpg)"></div>'.
				'	<div class="post_outer">'.
				'			<div class="post_owner_name"><a href = "profile.php?user='.$post_user_id.'" ><span> '.$post_owner.' </span></a></div>'.
				'			<div class="post_content">'.stripslashes($post_content) .'</div>'.
				'			<div class="post_time_container">'.$post_time.'</div>'.
				'			<div class="post_review">'.
				'				<div class="post_review_type"><span onclick = "like_cnt ('.$post_id.'); notify ('.$post_id.' , \''.$like_text.'\' )" id = "like'.$post_id.'" >'.$like_text.'(<span id="like_cnt'.$post_id.'">'.$likes.'</span>)</span></div>'.
//				'				<div class="post_review_type"><span > Comment(0) </span></div>'.
//				'				<div class="post_review_type"><span> Liked By </span></div>'.
				'			</div><!-- post_review -->'.
                '			<div class="comment_container" id = "'.$post_id.'">'.
	            '   			<div class="comment_box">'.
                '        			<div class="commenter_pic" style="background-image:url(all_user_img/user_'.$cuser.'/profile_pic.jpg)"></div>'.
                '           		<div class="comment_det_box">'.
				'						<div class="commenter_name">'.
                '           				<a href = "profile.php?profile_user='.$cuser.'">'.
                '                				<span>'.$cuser_name.'</span>'.
                '               			</a>'.
                '          				</div>'.
	            '           			<textarea  onkeyup="textAreaAdjust(this)" 
						onKeyPress="enterpressalert(event,this,'.$post_id.')" placeholder="Write a Comment..."></textarea>'.
				'					</div>'.                            
	            '       		</div>'.
	            '   		</div> <!-- comment_container -->'.
				'	</div> <!-- post_outer -->'.
				'</div> <!-- main_post_container -->';
	else
	$text =     '<div id = "main_post_container">'.
				'	<div class="post_owner_pic" style="background-image:url(all_user_img/user_'.$post_user_id.'/profile_pic.jpg)"></div>'.
				'	<div class="post_outer">'.
				'			<div class="post_owner_name"><a href = "profile.php?user='.$post_user_id.'"><span> '.$post_owner.' </span></a></div>'.
				'			<div class="post_content">'.
				'			<img height="400"  src="'.$img_path.'/'.$post_img_content.'"/>'.
				'			</div>'.
				'			<div class="post_time_container">'.$post_time.'</div>'.
				'			<div class="post_review">'.
				'				<div class="post_review_type"><span onclick = "like_cnt ('.$post_id.')" id = "like'.$post_id.'">'.$like_text.'(<span id="like_cnt'.$post_id.'">'.$likes.'</span>)</span></div>'.
	// 			'				<div class="post_review_type"><span > Comment(0) </span></div>'.
	//			'				<div class="post_review_type"><span> Liked By </span></div>'.
				'			</div><!-- post_review -->'.
                '			<div class="comment_container" id = "'.$post_id.'">'.
	            '   			<div class="comment_box">'.
                '        			<div class="commenter_pic" style="background-image:url(all_user_img/user_'.$cuser.'/profile_pic.jpg)"></div>'.
                '           		<div class="comment_det_box">'.
				'						<div class="commenter_name">'.
                '           				<a href = "profile.php?profile_user='.$cuser.'">'.
                '                				<span>'.$cuser_name.'</span>'.
                '               			</a>'.
                '          				</div>'.
	            '           			<textarea  onkeyup="textAreaAdjust(this)" onKeyPress="enterpressalert(event,this,'.$post_id.')" placeholder="Write a Comment..."></textarea>'.
				'					</div>'.                            
	            '       		</div>'.
	            '   		</div> <!-- comment_container -->'.
				'	</div> <!-- post_outer -->'.
				'</div> <!-- main_post_container -->';

	
	echo $text;	
?>