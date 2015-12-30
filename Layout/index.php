<?php
	require_once ('/scripts_php/session.php');
	include ('/scripts_php/classes/class.user.php');
	if (isset ($_SESSION['user_id']))
	 {
		$u = new User ($_SESSION['user_id'] , 'user');
				if ($u->isApproved() == 1)
		 {
		$u -> initiate_notification();		
		$u -> fetch_all_post ();

?>    
<?php /*if (isset($_SESSION['user_id']))	
 {
	require ('/scripts_php/config.php');
	$cuser = $_SESSION['user_id'];
	$sql = "SELECT post_id FROM user_post_tb WHERE pattern_id IN
		    (SELECT fpattern_id FROM user_friends_tb WHERE pattern_id = '$cuser') OR pattern_id = '$cuser' order by post_id ASC"; 
	$result = mysqli_query ($con,$sql);

	if (mysqli_num_rows ($result) > 0 )
		while ($row = mysqli_fetch_array($result))
		 {

			$post_id = $row['post_id'];
			// fetches name of owner of the post		
			$sql = mysqli_query ($con,"SELECT pattern_id , first_name , last_name FROM user_reg_tb WHERE pattern_id = 
					(SELECT pattern_id FROM user_post_tb WHERE post_id = '$post_id')");
			$re_post_ow_name = mysqli_fetch_array ($sql);
			$post_owner = $re_post_ow_name['first_name'].' ' . $re_post_ow_name['last_name'];
			$post_owner_id = $re_post_ow_name['pattern_id'];
			?>
			<script type="text/javascript">
				 fetch_post ('<?php echo $post_owner_id ?>','<?php echo $post_id ?>' , '<?php  echo $post_owner ;?>');
			</script>
			<?php
		 }//while end*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/symbol.png" />
<link href="styles/homeStyle.css" rel="stylesheet" type="text/css" />
<link href="styles/header.css" rel="stylesheet" type="text/css" />
<link href="styles/reset.css" rel="stylesheet" type="text/css" />
<link href="styles/post.css" rel="stylesheet" type="text/css" />
<link href="styles/left_slider.css" rel="stylesheet" type="text/css" />
<link href="styles/n_m_f_slider.css" rel="stylesheet" type="text/css" />

<script src="scripts/jquery.js"></script>
<script src="scripts/ajax_script.js"></script>
<script src="scripts/my_post_div.js"></script>
<script src="scripts/facility_script.js"></script>
<script src="scripts/myScript.js"></script>

<script src="scripts/on_off_status.js"></script>

<script type="text/javascript">


$(document).ready(function(e) {

	/*		INITIATING USER DETAILS		*/
	
	p = '<?php echo $u->user_details(); ?>';
	user = new User (p , 'user');
	user.set_user_details();
//	alert ('<?php echo $u->initiate_notification ();?>');
	$('#notification_text').html('<?php echo $u->initiate_notification() ?>');
	/*		INITIATING POST FETCHING		*/


	post_prop = [];

	
	len = <?php echo $u -> no_of_post ; ?> ;
	String.prototype.trim = function() 
	{
		 return this.replace(/^\s+|\s+$/g,"");
	} 


	<?php 
		for ($i = 0 ; $i < $u -> no_of_post ; $i++)
		{
	?>	
			//solver \n problem in php
			p = '<?php echo $u -> p[$i] -> get_all_val (); ?>';
			post_prop.push (p);

			
			p = '<?php echo $u -> p[$i] -> get_post_content ();?>';
			post_prop.push(p);
			
			p = '<?php echo $u->p[$i]->get_comment_cnt(); ?>';
			post_prop.push (p);
			
			
			p = '<?php echo $u->p[$i]->get_comment_det ();?>';
			post_prop.push (p);

	<?php
		}
	?>

	user.prepare_posts (len , post_prop);


});
on_off_flag = '<?php echo $_SESSION['user_online_status'];?>';

function initialize ()
 {
	 check_online_status ();
//	 update_likes();

//	 setTimeout (function () {update_likes ()} , 5000);	 */

 }
</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Linked Zone</title>
</head>

<body onLoad="initialize()">
	<div id="mainOuter">
    <!--			SIDEPANEL STARTING			-->
    	<div id="side_panel">
        	<div class="btn">
            	<a  href="index.php">
                    <div class="b_icon" style="background:url(images/symbol.png);"></div>
                    <div class="b_type" style="color:#82ba00;">Linked Zone</div>
                </a>
            </div>
            <hr />
        	<div class="btn">
            	<a href="index.php">
                    <div class="b_icon" style="background:url(images/icons/home.png);"></div>
                    <div class="b_type">Home</div>
                </a>
            </div>

        	<div class="btn">
            	<a href= "pictures.php">
                    <div class="b_icon" style="background:url(images/icons/user_images.png);"></div>
                    <div class="b_type">Images</div>
                </a>
            </div>

        	<div class="btn">
            	<a href="friend_requests.php?profile_user=<?php  echo $_SESSION['user_id']; ?>">
                    <div class="b_icon" style="background:url(images/icons/friends.png);"></div>
                    <div class="b_type">Friends</div>
                </a>
            </div>

        	<div class="btn">
            	<a href="search.php">
                    <div class="b_icon" style="background:url(images/icons/search.png);"></div>
                    <div class="b_type">Search Friends</div>
                </a>
            </div>

        	<div class="btn">
            	<a href="student_report.php">
                    <div class="b_icon" style="background:url(ADMIN/images/icons/manage_report.png);background-size:cover;"></div>
                    <div class="b_type">Your Report</div>
                </a>
            </div>
            <hr />

        	<div class="btn">
            	<a>
                    <div class="b_icon" style="margin-left:10px;">
	             		<button  id="on_off_btn" onClick="set_online_status ()"><pre> </pre></button>                    </div>
                    <div class="b_type" style="margin-top:2px;" id="on_off_text" onClick="set_online_status ()">Chat On</div>
                </a>
            </div>
            

            <br />
	
			<div id="online_users">
            
            </div>
            
            
        </div>	<!-- side_panel -->
	<!--			SIDEPANEL ENDING			-->
    
    
	<!--			HEADER STARTING			-->
        <div id="header">
        	<div class="pHolderCont">
           	  <a href="profile.php?profile_user=<?php echo $_SESSION['user_id']; ?>">
           	  <div class="holderPic" id="holder_picture"></div>
              <div class="holderName">
                      <span id="owner_name"></span>
              </div>
              </a>
            </div>
            
        	<div  class="btnPanel">
            	<div class="hbtn" style="background:url(images/icons/darrow.png);" id="hPulldwn" >
                      <div id="pulldown">
						<a href="settings.php">                      
		                   <div class="p_btn">
                                  Account Settings
                           </div>
					    </a>                           
                            <hr />                            
                       	<a  href="scripts_php/logout.php">                            
							<div class="p_btn">                            
                                  Logout
                            </div>
                        </a>                            
                      </div>
                    
                    
                </div>
            	<div class="hbtn" style="background:url(images/icons/friends.png);"></div>
<!--            	<div class="hbtn" style="background:url(images/icons/conversation.png);"></div>-->
            	<div class="hbtn" style="background:url(images/icons/notification.png);" id="bt1">
                	<div id="notification_text"></div>
                </div>                                                
            </div>
        </div><!-- header-->
	<!--			HEADER ENDING			-->
        
	<!--			RIGHT SLIDER STARTING			-->        
		<div id="slider">
        	<span>Notification</span>
            <hr />
            <li>
            	<div class="contentLi">
                	<div class="content">
                    	<div class="displayPic" style="background-image:url(all_user_img/user_2/profile_pic.jpg);"></div>
                    </div>
                    <div class="displayContent">
                    	<span>Bhavin Shah likes your post.</span>
                    </div>                    
				</div>            	
            </li>
			<hr />            
            
            <li>
            	<div class="contentLi">
                	<div class="content">
                    	<div class="displayPic" style="background-image:url(all_user_img/user_3/profile_pic.jpg);"></div>
                    </div>
                    <div class="displayContent">
                    	<span>Adit Fadia likes your post.</span>
                    </div>                    
				</div>            	
            </li>
			<hr />            


            <li>
            	<div class="contentLi">
                	<div class="content">
                    	<div class="displayPic" style="background-image:url(all_user_img/user_4/profile_pic.jpg);"></div>
                    </div>
                    <div class="displayContent">
                    	<span>Sagar Trivedi commented.</span>
                    </div>                    
				</div>            	
            </li>
			<hr />            

<!--
            <li>
            	<div class="contentLi">
                	<div class="content">
                    	<div class="displayPic"></div>
                    </div>
                    <div class="displayContent">
                    	<span>Harsh Soni likes your post.</span>
                    </div>                    
				</div>            	
            </li>
			<hr />            


            <li>
            	<div class="contentLi">
                	<div class="content">
                    	<div class="displayPic"></div>
                    </div>
                    <div class="displayContent">
                    	<span>Harsh Soni likes your post.</span>
                    </div>                    
				</div>            	
            </li>
			<hr />            
            -->

        </div>
	<!--			RIGHT SLIDDER ENDING			-->   
    
         
   		  <div id="mainContainer">
    	   
  	        <div id="user_all_activity">

				<div id="user_activity_cont">

                    <div class="new_post">
                		<div class="user_pic" id="user_post_pic"></div>                    	
                   		<div  id="post_type">
                        	<form name="homepost" id="pst_chng">
                            	<textarea   name="postVal" rows="4" tabindex="1" cols="50" placeholder="ENTER YOUR POST">
</textarea>	
                  		  <div id="sel_opt">
                    		<div class="opt_btn" id="text_content" onClick = "text_post ()"></div>
                            <span style="float:left; cursor:pointer;margin-top:7px; margin-right:5px;">Text</span>
                            <div class="opt_btn" id="image_content" onClick = "image_post ('user')" style="background:url(images/icons/post_imgt_icon.png)"></div>
                            <span style="float:left; margin-top:7px;cursor:pointer;" onClick = "image_post ('user')">Document</span>
	       				 </div>
                                
                             <div id="post_cancel_btns">

						        <input  type="reset" value="Cancel" tabindex="3" name="CancelBtn"/>	 
                                <input type="button" value="Post" id="post_btn" tabindex="2" name="postBtn" onClick="add_text_post (1 , 'user')" />

                            </form>
                        </div><!-- post_cancel_btns-->
               	    </div><!-- post_type-->
	                 </div> <!-- new_post -->
                     
                </div> <!-- user_activity_cont -->
                
                <div id="all_post">
                
                			<!--			USERPOST STARTING (DEFAULT EX,)			-->

													<!-- <div class="main_post_container">
            	<div class="post_owner_pic"></div>
                <div class="post_outer">
                	<div class="post_owner_name">
                    	<a href="#">
                        	<span>Harsh Soni</span>
                        </a>
                    </div>

                    <div class="post_content">
						What is a RACE ???...........A real race is when you are trying to finish off the 
                        Paani Poori,before the Paani Poori boy puts the next one into the plate!                    
                    </div>
	                <div class="post_time_container">11/10/2013 00:00</div>   
                    
                    <div class="post_review">
                    	<div class="post_review_type"><span>Like (50) </span> </div>
                    	<div class="post_review_type"><span>Comment (50) </span> </div>                        
                    </div>	<!-- post_review 
                    
                    <div id="comment_container">
                    	<div class="comment_box">
							<div class="commenter_pic"></div>
                            <div class="comment_det_box">
                            	<div class="commenter_name">
                                	<a href="#">
                                    	<span>Harsh Soni</span>
                                    </a>
                                </div>
                                <div class="comment">
                                	 <textarea  onkeyup="textAreaAdjust(this)" onKeyPress="enterpressalert(event, this)" placeholder="Write a Comment..."></textarea>  
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- comment_box
                        <hr />
                    	<div class="comment_box">
							<div class="commenter_pic"></div>
                            <div class="comment_det_box">
                            	<div class="commenter_name">
                                	<a href="#">
                                    	<span>Harsh Soni</span>
                                    </a>
                                </div>
                                <div class="comment">
                                	 <textarea  onkeyup="textAreaAdjust(this)" onKeyPress="enterpressalert(event, this)" placeholder="Write a Comment..."></textarea>  
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- comment_box 
						<hr />
                    	<div class="comment_box">
							<div class="commenter_pic"></div>
                            <div class="comment_det_box">
                            	<div class="commenter_name">
                                	<a href="#">
                                    	<span>Harsh Soni</span>
                                    </a>
                                </div>
                                <div class="comment">
                                	 <textarea  onkeyup="textAreaAdjust(this)" onKeyPress="enterpressalert(event, this)" placeholder="Write a Comment..."></textarea>  
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- comment_box 

                        
                    </div> <!-- comment_container 
                </div><!-- post_outer 
                
                <div class="post_modi">
                	<div class="pulldown">
                    	<div class="p_e_btn">
                            <div class="edit_option">
                                <a href="#">
                                    <span>Edit Post</span>
                                </a>
                            </div>
                        </div>
                        <hr />
                    	<div class="p_e_btn">
                            <div class="edit_option">
                                <a href="#">
                                    <span>Delete Post</span>
                                </a>
                            </div>
                        </div>
                        <hr />
                    	<div class="p_e_btn">
                            <div class="edit_option">
                                <a href="#">
                                    <span>Report Post</span>
                                </a>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>	<!-- post_modi 

            </div>	<!-- main_post_container -->

                			<!--			USERPOST ENDING (DEFAULT EX,)			-->     
       
        
            	</div>
                <div id="main_advertise_cnt">
                	<a href="http://www.asia-infotech.com" target="_blank">
                      <div class="adv">
                            <div class="about_adv">
                                <span>Asiainfotech Company</span>
                                <span id="site_name">asiainfotech.com</span>
                            </div> <!-- about_adv-->
    
                            <div class="adv_img">
                                <img src="images/AIasia-infotech_10.gif"/>
                            </div> <!-- adv_img -->
                            <div class="det_adv">
                                <span>
                                Asia Infotech is a high quality CAD service provider.  </span>
                            </div> <!-- det_adv -->
    
                        </div>	<!-- adv -->
                    </a>
                    <hr />
                	<a href="http://www.xpert-infotech.com" target="_blank">
                      <div class="adv">
                            <div class="about_adv">
                                <span>Xpert Infotech Company</span>
                                <span id="site_name">xpert-infotech.com</span>
                            </div> <!-- about_adv-->
    
                            <div class="adv_img">
                                <img src="images/xpert.jpg"/>
                            </div> <!-- adv_img -->
                            <div class="det_adv">
                                <span>
                                	X-pert Infotech is a creative Classes  for Traning & Project Devlopment.
                                </span>
                            </div> <!-- det_adv -->
    
                        </div>	<!-- adv -->
                    </a>
                    <hr />
                	<a href="http://www.shiksha.com" target="_blank">
                      <div class="adv">
                            <div class="about_adv">
                                <span>Shiksha</span>
                                <span id="site_name">shiksha.com</span>
                            </div> <!-- about_adv-->
    
                            <div class="adv_img">
                                <img src="images/shiksha.jpg"/>
                            </div> <!-- adv_img -->
                            <div class="det_adv">
                                <span>
                                Shiksha.com caters to the educational requirements and queries of students. </span>
                            </div> <!-- det_adv -->
    
                        </div>	<!-- adv -->
                    </a>
                    

                </div>
                

            </div> <!-- user_all_activity -->
	      <div>        <!-- mainContainer -->
        
   </div>	<!-- mainOuter-->
  
</div>

</body>
</html>
<?php   
	}//isapprove if
	else
	 {

	?>
     	 <script type="text/javascript">
	       window.location.replace('request_pending.php');
        </script>

        <?php 
	 }//isapprove else
	 }//isset if
		 
else
 {
	?>
		<script type="text/javascript">
        window.location.replace('login.php');
        </script>
    <?php  
	 
	 
 }
?>


