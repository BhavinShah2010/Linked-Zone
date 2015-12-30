<?php
	require_once('scripts_php/session.php');
	require_once('scripts_php/config.php');
	
	 $user_id="";	
	 $fname = "";
	 $lname= "";	 
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
<link href="styles/Account_Information.css" rel="stylesheet" type="text/css" />
<script src="scripts/on_off_status.js"></script>
<script src="scripts/jquery.js"></script>     
<script type="text/javascript">
on_off_flag = <?php echo $_SESSION['user_online_status']; ?>;
function initialize ()
	 {
		 //owner_name ='?php  echo $_SESSION['f_name'].' '.$_SESSION['l_name']; ?>';
		 owner_name ='<?php  echo $fname.' '.$lname; ?>';
		  $('.on_off_btn_box').css('box-shadow','0px 0px 7px #999797');
		   $('.on_off_btn_email').css('box-shadow','0px 0px 7px #999797');
		
		 
		
		 $('#holder_picture , #user_post_pic').css('background-image','url(all_user_img/user_'+ <?php echo $_SESSION['user_id'] ?> +'/profile_pic.jpg)');
		 $('#holder_picture , #user_post_pic').css('background-size','100% 100%');
		 $('#owner_name').html(owner_name);
		 $('#save_name').attr('disabled' , true);
		$('#cancel_name').attr('disabled' , true);
		  
	 }

</script>
<script src="scripts/common_script.js"></script>

</head>

<body onload="initialize ()" >
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
            	<a href="Account_Information.php">
                    <div class="b_icon" style="background:url(images/icons/Account_Info.png);"></div>
                    <div class="b_type">Account Information</div>
                </a>
            </div>

        	<div class="btn">
            	<a href= "Privacy.php">
                    <div class="b_icon" style="background:url(images/icons/Privacy_icon.png);"></div>
                    <div class="b_type">Privacy</div>
                </a>
            </div>
            
        </div>	<!-- side_panel -->
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
        <div id="Account_Info_box">
        	<span>Account Information</span>
            <span style="font-size:1em; color:#000; font-weight:500;">Here You can get informed about your account</span>
        </div>
        <div id="main_cnt">
        	<div id="personal_info_bx">
                	<span>Personal Information</span>
                 <br />
      <div id="on_off_btn_box" >
       <div class="on_off_btn_box">
        <div class="onoffswitch">
         <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
           <label class="onoffswitch-label" for="myonoffswitch">
             <div class="onoffswitch-inner">
                   <div class="onoffswitch-active" >
                     <div class="onoffswitch-switch">OFF</div>
                  </div>
           		    <div class="onoffswitch-inactive" >
                     <div class="onoffswitch-switch">ON</div>
                 </div>
    </div><!-- onoffswitch-inner-->
    </label>
    </div> <!--onoffswitch-->
                        
 	</div><!--.on_off_btn_box-->
 </div><!--#on_off_btn_box-->
                    <div id="user_info_box">
                    <input type="text" name="fname"  class="fname" id="fname" value="<?php echo $fname ?>" disabled="disabled" />
                    <input type="text" name="lname" class="lname" id="lname" value="<?php echo $lname ?>" disabled="disabled" />			</div>
        	            <div id="save_cancel_box">
	        	            <input type="button" name="save" id="save_name"  value="Save Changes" />
    	        	        <input type="reset" name="cancel" id="cancel_name"  value="Cancel" />
                    	</div>
                    
              
            </div><!--personal_info_bx-->
            <hr />
            
            <div id="contact_info_box">
	            <span>Contact Information</span>
                <br />
                
                
                <!--<div id="on_off_btn_email" >
       <div class="on_off_btn_email" >
         <div class="onoffswitch_email">
   		   <input type="checkbox" name="onoffswitch_email" class="onoffswitch-checkbox_email" id="myonoffswitch_email" checked>
             <label class="onoffswitch-label_email" for="myonoffswitch_email">
               <div class="onoffswitch-inner_email">
                	 <div class="onoffswitch-active_email">
                  	  <div class="onoffswitch-switch_email">OFF</div>
               	     </div>
   		 		     <div class="onoffswitch-inactive_email">
                	   <div class="onoffswitch-switch_email">ON</div>
                     </div>
    		   </div><!-- onoffswitch-inner--
    </label>
    </div> <!--onoffswitch--
                        
 	</div><!--.on_off_btn_box--
 </div><!--#on_off_btn_box-->
 
 
    		        <div id="email_id_box">
            			<span style="font-size:1em;">Email Id : 
				            <input type="text" name="email" class="email" id="email" value="<?php  echo $user_id;											?>" disabled="disabled" style="margin-left:10px;" /></span>
		            </div>
                    
                    
     
     </div><!--contact_info_box -->
        
        
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