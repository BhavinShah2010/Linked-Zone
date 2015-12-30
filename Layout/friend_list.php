<?php
	require_once('scripts_php/session.php');
	if (isset ($_SESSION['user_id']))
	 {
		 $pro_ow_id =  $_REQUEST['profile_user'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Linked Zone</title>
<link rel="shortcut icon" href="images/symbol.png" />
<link href="styles/reset.css" rel="stylesheet" type="text/css" />
<link href="styles/left_slider.css" rel="stylesheet" type="text/css" />
<link href="styles/search.css" rel="stylesheet" type="text/css" />
<link href="styles/header.css" rel="stylesheet" type="text/css" />
<link href="styles/n_m_f_slider.css" rel="stylesheet" type="text/css" />
<script src="scripts/jquery.js"></script>     
<script src="scripts/myScript.js"></script>
<script src="scripts/on_off_status.js"></script>
<script src="scripts/fetch_friend_list.js"></script>

<script type="text/javascript">
on_off_flag = <?php echo $_SESSION['user_online_status']; ?>;
function initialize ()
 {
	
	 owner_name ='<?php echo $_SESSION['f_name'].' ' .$_SESSION['l_name']; ?>';
	 $('#owner_name').html(owner_name);
	 check_online_status ();

	 $('#holder_picture , #user_post_pic').css('background-image','url(all_user_img/user_'+ <?php echo $_SESSION['user_id']; ?> +'/profile_pic.jpg)');
	 $('#holder_picture , #user_post_pic').css('background-size','100% 100%');	
	 fetch_friend_list ('<?php echo $pro_ow_id ?>');

//	 setTimeout (function () {update_likes ()} , 5000);	 
 }


</script>

</head>

<body onload="initialize()">
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
        <div id="main_search_cnt">
        	<span style="font-size:20px; display:table; color:#95ab08; margin:1%;">Friends</span>
            <hr />

            <div id="search_result">
			<li>
			<a href="home.php">;
			<div class="searched_person_cnt">
				<div class="searched_person_pic">';
				
                
						<div class="searched_person_det">
							 <span>Bhavin Shah</span>';
							 </div>
							 </div>
							 </a>
						</li>
            
            </div>	<!-- search_result -->
        </div><!-- main_search_cnt -->
        
</div> <!-- mainOuter -->
</body>
<?php }
	else
	 {
?>
    <script type="text/javascript">
    window.location.replace('login.php');
    </script>


<?php } ?>
</html>