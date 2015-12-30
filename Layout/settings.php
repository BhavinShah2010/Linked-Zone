<?php
	require_once('scripts_php/session.php');
	require_once('scripts_php/config.php');
	
	if (isset ($_SESSION['user_id']))
	 {
		 
		$cuser = $_SESSION['user_id']; 
		$sql = "SELECT * FROM user_reg_tb where pattern_id = '".$cuser."' ";
		$result = mysqli_query($con , $sql);
		
		while($row=mysqli_fetch_array($result))
		{
			$user_id = $row["user_id"] ;
			$fname = $row["first_name"];	
			$lname = $row["last_name"];	
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Linked Zone</title>

<link rel="shortcut icon" href="images/symbol.png" />
<link href="styles/reset.css" rel="stylesheet" type="text/css" />
<link href="styles/left_slider.css" rel="stylesheet" type="text/css" />
<link href="styles/header.css" rel="stylesheet" type="text/css" />
<link href="styles/n_m_f_slider.css" rel="stylesheet" type="text/css" />
<link href="styles/setting.css" rel="stylesheet" type="text/css" />
<script src="scripts/on_off_status.js"></script>
<script src="scripts/jquery.js"></script>     
<script type="text/javascript">
on_off_flag = <?php echo $_SESSION['user_online_status']; ?>;
function initialize ()
	 {
		
		 //owner_name ='?php  echo $_SESSION['f_name'].' '.$_SESSION['l_name']; ?>';
			owner_name ='<?php  echo $fname.' '.$lname; ?>';
		
		 $('#holder_picture , #user_post_pic').css('background-image','url(all_user_img/user_'+ <?php echo $_SESSION['user_id'] ?> +'/profile_pic.jpg)');
		 $('#holder_picture , #user_post_pic').css('background-size','100% 100%');
		 $('#owner_name').html(owner_name);
		  
	 }

</script>
<script src="scripts/myScript.js"></script>

</head>

<body onload="initialize ()" >
	<div id="mainOuter">
    	<!--<div id="side_panel">
        	<!--<div class="btn">
            	<a  href="index.php">
                    <div class="b_icon" style="background:url(images/symbol.png);"></div>
                    <div class="b_type" style="color:#93ab08;">Linked Zone</div>
                </a>
            </div>
            <hr />
        	<!--<div class="btn">
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
            	<a href="#">
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
        	
            

            <br />
	
			
            
            
        </div> !-->
        
        <div id="header">
        <a href="profile.php">
        	<div class="pHolderCont">
            	<div class="holderPic" id="holder_picture"></div>
            	<div class="holderName">
					<span id="owner_name"></span>
                </div>
            </div>
            </a>
            
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
            	<div class="hbtn" style="background:url(images/icons/notification.png);" id="bt1"></div>                                                
            </div>
        </div><!-- header-->

        
        		<div id="slider">
        	<span>Notification</span>
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
            

        </div>

        <div id="main_cnt">
        	<div id="setting_tag_bx">
            	<span>Account Settings</span>
                <span style="font-size:1.1em; color:#939393; font-weight:600;" >This is the place where you can set your account as per your interest</span>
            </div>
            <div id="main_setting_type_box">
            <a href="Account_Information.php">
            <div class="setting_type_bx" >
            
            
             <div class="setting_type_tag_bx">
             <div class="icon_box">
             </div>
            	<span>Account Information</span>
                 
                </div>
                <div class="setting_type_det_bx">
               
                <span>You can change your account settings which you
                 had entered at the time of your registration 
                </span>
            </div>
            </div>
            </a>
             <a href="Privacy.php">
            <div class="setting_type_bx">
             <div class="setting_type_tag_bx">
            
            <div class="icon_box">
             </div>
	            <span>Privace Your Account</span>
                </div>
                 <div class="setting_type_det_bx">
                 <span>Wanna share with every one ??? or No one???</span>
                 </div>
                
            </div>            
				
           </div>
           </a>
           
        </div>
       <!-- <div id="main_search_cnt">
        	<div id="setting_box" >
            	
               
                
            </div>
            <div class="box"></div>
             <div class="box"></div>
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