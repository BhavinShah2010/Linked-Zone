<?php

error_reporting(E_ALL);
include('class.upload.php');
include ('scripts_php/config.php');
include ('scripts_php/session.php');
$img_path = "all_user_img/user_".$_SESSION['user_id'];
$dir_dest = (isset($_GET['dir']) ? $_GET['dir'] : $img_path);
$dir_pics = (isset($_GET['pics']) ? $_GET['pics'] : $dir_dest);

if ((isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : '')) == 'xhr') 
	{	// main if started

		if (isset($_SERVER['HTTP_X_FILE_NAME']) && isset($_SERVER['CONTENT_LENGTH'])) 
			{
				$handle = new Upload('php:'.$_SERVER['HTTP_X_FILE_NAME']);  

    		}
	    else 
			{  
		        $handle = new Upload($_FILES['my_field']);       
		    }
    
    	if ($handle->uploaded) 
			{
				$post_type = 0;
				$date = date('Y/m/d H:i:s');
				$sql = "INSERT INTO post_tb (post_id , post_type , post_text_content , post_img_content , time_of_post, post_like_counter) Values
					 ('','$post_type'  , '' , 'img_ct' , '$date', '0')" or die ("prbs");
				$result = mysqli_query ($con ,$sql);	
				if ($result)
					 {
						$result = mysqli_fetch_array(
									mysqli_query($con,"SELECT post_id from post_tb where time_of_post = '$date'"));
						$post_id = $result['post_id'];

				$handle -> file_new_name_body = 'img_'.$post_id;
														
		        $handle->Process($dir_dest);				
				
		        if ($handle->processed) 
					{
						$img_name =$handle-> file_dst_name;
						mysqli_query ($con, "UPDATE post_tb SET post_img_content = '$img_name' WHERE post_id ='$post_id'");						
						$cuser = $_SESSION['user_id'];
						mysqli_query ($con,"INSERT INTO user_post_tb (pattern_id , post_id) VALUES 
							('$cuser' , '$post_id')");
						$result = mysqli_fetch_array (mysqli_query ($con,"SELECT * FROM post_tb WHERE post_id = '$post_id'"));
						
						/*$text =     '<div id = "main_post_container">'.
									'<div class="post_owner_pic" style="background-image:url(all_user_img/user_'.$_SESSION['user_id'].'/profile_pic.jpg)"></div>'.
									'<div class="post_outer">'.
									'<div class="post_owner_name"><a href = "profile.php?user='.$cuser.'"><span> '.$_SESSION['f_name']. ' ' . $_SESSION['l_name'].' </span></a></div>'.
									'<div class="post_content">'.
								    '<img height="300" width="400" src="'.$dir_pics.'/'.$result['post_img_content'].'"/></div>'.
									'<div class="post_time_container">'.$result['time_of_post'].'</div>'.
									'<div class="post_review">'.
									'<div class="post_review_type"><span onclick = "like_cnt ('.$post_id.')" id = "like'.$post_id.'">Like(<span id="like_cnt'.$post_id.'">'.$result['post_like_counter'].'</span>)</span></div>'.
									'<div class="post_review_type"><span > Comment(0) </span></div>'.
									'<div class="post_review_type"><span> Liked By </span></div>'.
									'</div></div></div>';*/
	$text  =	'<div class="main_post_container" id = "'+id+'">'.
				'	<div class="post_owner_pic" style="background-image:url(all_user_img/user_'+ this.post_owner_id +'/profile_pic.jpg)"></div>'.
				'	<div class="post_outer">'.
				'		<div class="post_owner_name">'.
 	   			'			<a href = "profile.php?user='+this.post_owner_id+'"">'.
				'				<span>'+ this.post_owner_name +'</span>'.
		    	'			</a>'.
				'		</div>'.
				'	<div class="post_content">'.
				'<img height = 400 >'.
				'	</div>'.
			   	'	<div class="post_time_container">'+ this.post_date_time + '</div>'.
				'	<div class="post_review">'.
		 		'		<div class="post_review_type"><span onclick = "toggle_like ('+id+',this)">'+this.toggle_like (this.post_like_flag ,'Y' , id) + '</span> </div>'.
		   		'		<div class="post_review_type"><span>Comment ('+this.no_of_comments+') </span> </div>'+
		        ' 	</div>	<!-- post_review -->'.
		 		'	<div id="comment_container">'.
					
                        
				'	</div> <!-- comment_container -->'.
					
				'	</div><!-- post_outer -->'.
	                
				'<div class="post_modi">'.
				'	<div class="pulldown">'.
/*				'		<div class="p_e_btn">'+
				'			<div class="edit_option">'+
				'				<a href="#">'+
				'					<span>Edit Post</span>'+
				'				</a>'+
				'			</div>'+
				'		</div>'+
				'		<hr />'+*/
//				if (cuser == this.post_owner_id)
//				 {
				'		<div class="p_e_btn">'.
				'			<div class="edit_option">'.
				'				<a href="#">'.
				'					<span onClick = "delete_post ('+id+')">Delete Post</span>'+
				'				</a>'.
				'			</div>'.
				'		</div>'.
				'		<hr />'.
//				 }
				'		<div class="p_e_btn">'.
				'			<div class="edit_option">'.
				'				<a href="#">'.
				'					<span>Report Post</span>'.
				'				</a>'.
				'			</div>'.
				'		</div>'.
				'	</div> <!-- edit_post_pulldown --> '.
				'</div>	<!-- post_modi -->'.
				'</div>	<!-- main_post_container -->';									
/*						$text =     '<div id = "main_post_container">'.
									'	<div class="post_owner_pic" style="background-image:url(all_user_img/user_'.$_SESSION['user_id'].'/profile_pic.jpg)"></div>'.
									'	<div class="post_outer">'.
									'	<div class="post_owner_name"><a href = "profile.php?user='.$cuser.'"><span> '.$_SESSION['f_name']. ' ' . $_SESSION['l_name'].' </span></a></div>'.
									'			<div class="post_content">'.
									'				<img height="400"  src="'.$dir_pics.'/'.$result['post_img_content'].'"/>'.
									'			</div>'.
									'			<div class="post_time_container">'.$result['time_of_post'].'</div>'.
									'			<div class="post_review">'.
									'				<div class="post_review_type"><span onclick = "like_cnt ('.$post_id.')" id = "like'.$post_id.'">Like(<span id="like_cnt'.$post_id.'">'.$result['post_like_counter'].'</span>)</span></div>'.
									'				<div class="post_review_type"><span > Comment(0) </span></div>'.
									'				<div class="post_review_type"><span> Liked By </span></div>'.
									'			</div><!-- post_review -->'.
									'			<div class="comment_container">'.
									'   			<div class="comment_box">'.
									'        			<div class="commenter_pic"></div>'.
									'           		<div class="comment_det_box">'.
									'						<div class="commenter_name">'.
									'           				<a href = "#">'.
									'                				<span>Harsh Soni</span>'.
									'               			</a>'.
									'          				</div>'.
									'           			<textarea  onkeyup="textAreaAdjust(this)" onKeyPress="enterpressalert(event, this)" placeholder="Write a Comment..."></textarea>'.
									'					</div>'.                            
									'       		</div>'.
									'   		</div> <!-- comment_container -->'.
									'	</div> <!-- post_outer -->'.
									'</div> <!-- main_post_container -->';
														
							
						echo $text;	*/
			        } 
				else 
					{
						echo '<p class="result">';
						echo '  <b>File not uploaded to the wanted location</b><br />';
						echo '  Error: ' . $handle->error . '';
						echo '</p>';
			        }
        $handle-> Clean();
					 }
					else
					 die (mysqli_error ());
		

    }
 else 
 	{
        echo '<p class="result">';
        echo '  <b>File not uploaded on the server</b><br />';
        echo '  Error: ' . $handle->error . '';
        echo '</p>';
    }


}	// main if stopped

if (/*!$cli &&*/ !(isset($_SERVER['HTTP_X_FILE_NAME']) && isset($_SERVER['CONTENT_LENGTH']))) 
	{

	    echo '<p class="result"><a href="index.html">do another test</a></p>';

	    if (isset($handle)) 
		{
			echo '<pre>';
			echo($handle->log);
			echo '</pre>';
	    }
	}
?>