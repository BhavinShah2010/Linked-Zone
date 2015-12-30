<?php
require_once ('\scripts_php\session.php');
?>
<script src="scripts/jquery.js"></script>     
<script src="scripts/ajax_script.js"></script>
<?php
/*if (isset($_SESSION['user_id']))	
 {
	require ('\scripts_php\config.php');
	$cuser = $_SESSION['user_id'];
	$pro_owner_id = $_REQUEST['profile_user'];
	$sql = "SELECT post_id FROM user_post_tb WHERE pattern_id = $pro_owner_id";
	$result = mysqli_query ($con,$sql);
	
	$sql = mysqli_query ($con,"SELECT * FROM user_reg_tb WHERE pattern_id = '$pro_owner_id'");
	$re_pro_ow_det = mysqli_fetch_array ($sql);
	$pro_owner = $re_pro_ow_det['first_name'].' '.$re_pro_ow_det['last_name'];
	
	while ($row = mysqli_fetch_array($result))
	 {
		$post_id = $row['post_id'];
		// fetches name of owner of the post		
		?>
        <script type="text/javascript">
			 fetch_post ('<?php echo $pro_owner_id ?>','<?php echo $post_id ?>' , '<?php  echo $pro_owner ;?>');
        </script>
        <?php
	 }//while end
	 
	 $sql = mysqli_query ($con,"SELECT * FROM user_friends_tb WHERE pattern_id = '$pro_owner_id' AND fpattern_id = '$cuser'");
	 if (mysqli_num_rows ($sql) != 0 || $cuser == $pro_owner_id)
	 	{?>
        	<script type="text/javascript">
				$(document).ready(function(e) {
					$('#add_frnd_btn').css('visibility','hidden');
                });

            </script>
        <?php
		}
	 else
	  	{
			$sql = mysqli_query ($con,"SELECT * FROM user_friend_req_tb WHERE pattern_id = '$cuser' AND fpattern_id = '$pro_owner_id'");
			if (mysqli_num_rows($sql) > 0)
			 {
				 ?>
                 <script type="text/javascript">
				 	$(document).ready(function(e) {
						$('#add_frnd_btn span').html ('Request Sent');
						$('#add_frnd_btn').css('background-color','#ccc');
						$('#add_frnd_btn span').css('color','#777');
						$('#user_activity_cont').css('visibility','hidden');
                    });
				</script>
			<?php
			 }
		}*/
 
?>
       
       


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
<link href="styles/profile.css" rel="stylesheet" type="text/css" />


<script src="scripts/myScript.js"></script>
<script src="scripts/friend_requests.js"></script>
<script src="scripts/on_off_status.js"></script>
<script type="text/javascript">
on_off_flag = <?php echo $_SESSION['user_online_status']; ?>;
cuser = <?php echo $_SESSION['user_id']; ?>
        

     
   
function initialize ()
 {
	 owner_name ='<?php echo $_SESSION['f_name'].' '.$_SESSION['l_name']; ?>';
	 $('#owner_name').html(owner_name);
	 check_online_status ()
	 update_likes();
	 $('#holder_picture , #user_post_pic').css('background-image','url(all_user_img/user_'+ <?php echo $cuser; ?> +'/profile_pic.jpg)');
	 $('#holder_picture , #user_post_pic').css('background-size','100% 100%');	 
//	 setTimeout (function () {update_likes ()} , 5000);	 
 }
function textAreaAdjust(o) {
    o.style.height = "1px";
    o.style.height = (10+o.scrollHeight)+"px";
} 

function enterpressalert(e, textarea){
	
var code = (e.keyCode ? e.keyCode : e.which);
if(code == 13) { //Enter keycode

// alert('enter press');
}
}
</script>

<script type="text/javascript">
function readURL(input)
 {
    if (input.files && input.files[0]) 
	{
        var reader = new FileReader();

        reader.onload = function (e)
		{
                $('#pr_pic').attr('src', e.target.result);
				$('#msg').html ('');				
        }
		reader.onprogress = function (e)
		{
				$('#msg').html ('Uploading');
	  	}

        reader.readAsDataURL(input.files[0]);
    }
}
</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Linked Zone</title>
</head>

<body onLoad="initialize()">
	<div id="mainOuter">
    
  	<div id="side_panel">
        	<div class="btn">
            	<a  href="index.php">
                    <div class="b_icon" style="background:url(images/symbol.png);"></div>
                    <div class="b_type" style="color:#93ab08;">Linked Zone</div>
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
						<a href="Account_settings.php">                      
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
            	<div class="hbtn" style="background:url(images/icons/notification.png);" id="bt1"></div>                                                
            </div>
        </div><!-- header-->


        
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
   		  <div id="mainContainer">
          
          
          <div id="profile_main_container">
                 <div id="about_us_container">
                 	<div class="basic_information" style="color:#93ab08;"><?php echo $pro_owner; ?></div>
                    
                    <div class="basic_information">Studying At K S SCHOOL OF BUSINESS MANAGEMENT(CA&IT) </div>
                  
                    <div class="basic_information">Born On 11/10/1993</div>
                    
                 </div><!-- About Us Container-->
                
        		  <!--<div id="profile_pic_container" style="background:url(all_user_img/user_?php echo $_SESSION['user_id'] ?>/profile_pic.JPG); background-size:100% 100%; ">
                  <!--<img src="all_user_img/user_2'+ /*?php echo $cuser ?>*/+ '/profile_pic.jpg)" />-->
                 <!-- <img src="all_user_img/user_2/profile_pic.JPG" width="140" height="140" />--
                  </div>
                  
                  <div id="frnd_request_btn" onClick="chnage_name()"></div>-->
                  
                  
        			 
                           <div id="container">
                           	<a href="profile_det.php?profile_user=<?php echo $pro_owner_id; ?>"><div class="btns"><span>About <?php echo $re_pro_ow_det['first_name'] ; ?></span></div></a>
                            <a href="friend_list.php?profile_user=<?php echo $pro_owner_id;?>"><div class="btns"><span><?php echo $re_pro_ow_det['first_name'] ."'s Friends " ; ?></span></div></a>
                            <div class="btns" id="add_frnd_btn" style="cursor:pointer;" onClick="send_friend_request ('<?php echo $pro_owner_id ?>')"><span>Add Friend</span></div>
                           </div>
                      
                     
                      <div id="profile_pic_container">
                     	 <div id="profile_pic" >
                         <form action="scripts_php/upload_img.php" method="post" enctype="multipart/form-data">
                         	<img src="all_user_img/user_<?php echo $pro_owner_id ?>/profile_pic.jpg" id="pr_pic" />
                             <!--<input type="file"  name="file" onChange="readURL (this)">-->
                             
						</div>
                        </form>
                   	 <a href="#"><div id="profile_pic_change">
                         	<span>Change Profile Picture</span>
                         </div></a>
                      </div>
                 
                       
         			 	
         			
                  
          	
        		</div><!-- profile_main_container-->
    	    <!--   
                      	-->
  	        <div id="user_all_activity">

				<div id="user_activity_cont">

                    <div class="new_post">
                		<div class="user_pic" id="user_post_pic"></div>                    	
                   		 <div  id="post_type">
								<form name="homePost"  id="pst_chng">
						        <textarea name="postVal" rows="7" tabindex="1" cols="50"  placeholder="ENTER YOUR POST" style="resize:none;"></textarea>        
						 </div>     <!-- post_type-->                           
                    	 <div id="post_cancel_btns">
                         		<div id="chng_btns">
						        <input  type="reset" value="Cancel" tabindex="3" name="CancelBtn"/>	 
                                <input type="button" value="Post" id="post_btn" tabindex="2" name="postBtn" onClick="addPost(cuser,owner_name)" />

					        </form>  </div>
                     
                  		  <div id="sel_opt">
                    		<div class="opt_btn" id="text_content"></div>
                            <div class="opt_btn" id="image_content" style="background:url(images/icons/post_imgt_icon.png);"></div>
	       				  </div>
	                	 </div><!-- post_cancel_btns-->
	                 </div> <!-- new_post -->
                     
                </div> <!-- user_activity_cont -->

  <!--         <div id="main_post_container">
			<div class="post_owner_pic"></div>
                <div class="post_outer">
                	<div class="post_owner_name"><span>Harsh Soni</span></div>
                    <div class="post_content">What is a RACE ???...........A real race is when you are trying to finish off the Paani Poori,before the Paani Poori boy puts the next one into the plate! </div>
                    <div class="post_time_container">11/10/2013 00:00</div>
                    <div class="post_review">
                    	<div class="post_review_type"><span> 50 Like </span></div>
                    	<div class="post_review_type"><span> Comment </span></div>
                    </div>
                	<div class="comment_container">
	                	<div class="comment_box">
                        	<div class="commenter_pic"></div>
                            <div class="comment_det_box">
							<div class="commenter_name">
                            	<a href = "#">
                                	<span>Harsh Soni</span>
                                </a>
                            </div>
                            
	                        <textarea  onkeyup="textAreaAdjust(this)" onKeyPress="enterpressalert(event, this)" placeholder="Write a Comment..."></textarea>                            
							</div>                            
	                    </div>
                        
	                </div> <!-- comment_container 
                
                </div> --><!-- post_outer -->
               

            <!--</div>     <!-- main_post_container -->
            
           <!-- <div id="main_post_container">
				<div class="post_owner_pic" style="background:url(images/profile_b.jpg);"></div>
    	           <div class="post_outer">
        	       	<div class="post_owner_name"><span>Bhavin Shah</span></div>
            	       <div class="post_content">Trust is when the "last seen at" doesn't matter ! </div>
                	   <div class="post_time_container">26/10/2013 01:01</div>
	                   <div class="post_review">
    	               	<div class="post_review_type"><span>100  Like </span></div>
        	           	<div class="post_review_type"><span> Comment </span></div>
	                   </div>
    	           </div>
           </div>     <!-- main_post_container -->
            
            </div> <!-- user_all_activity -->
	      <div>        <!-- mainContainer -->
        
   </div>	<!-- mainOuter-->
  
</div>

<script type="text/javascript">

</script>
</body>
</html>
<?php   
/*}
else
 {
	?>
		<script type="text/javascript">
        window.location.replace('login.php');
        </script>
    <?php  
	 
	 
 }*/
?>


