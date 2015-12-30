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
			$privacy_status = $row['privacy_status'];
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
<link href="styles/Privacy.css" rel="stylesheet" type="text/css" />

<script src="scripts/on_off_status.js"></script>
<script src="scripts/jquery.js"></script>     
<script type="text/javascript">
on_off_flag = <?php echo $_SESSION['user_online_status']; ?>;
function initialize ()
	 {
		
		 owner_name ='<?php  echo $fname .' '. $lname ?>';
		  //owner_name ='?php  echo $_SESSION['f_name'].' '.$_SESSION['l_name']; ?>';
		
		 
		
		 $('#holder_picture , #user_post_pic').css('background-image','url(all_user_img/user_'+ <?php echo $_SESSION['user_id'] ?> +'/profile_pic.jpg)');
		 $('#holder_picture , #user_post_pic').css('background-size','100% 100%');
		 $('#owner_name').html(owner_name);
		 $('#myonoffswitch_privacy').attr("disabled" , "disabled");
		 $('#privacy_edit_box').css('opacity' , 0.3);

		 ele = document.getElementById('select_opt');
		 ele1 = ele.getElementsByTagName ('option');
		 ele1[<?php echo $privacy_status - 1;?>].setAttribute ("selected" , "selected");

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
                    <div class="b_icon" style="background:url(images/icons/Privacy_icon.png); width:35px; height:35px;"></div>
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
        
        <div id="Privacy_tag_box">
        	<span>Profile Privacy </span>
           <span style="font-size:1em; color:#000; font-weight:500;">Manage an account how it looks for others </span>
                   </div>
        
         <div id="main_cnt">
         
          <div id="privacy_ena_dis_box">
           		
            	<div id="on_off_ena_dis_btn_profile_box" >
       				<div class="on_off_ena_dis_btn_profile_box">
        				<div class="onoffswitch_ena_dis">
         				<input type="checkbox" name="onoffswitch_ena_dis" class="onoffswitch-checkbox_ena_dis" id=     	      	                         "myonoffswitch_ena_dis" checked>
                           <label class="onoffswitch-label_ena_dis" for="myonoffswitch_ena_dis">
                              <div class="onoffswitch-inner_ena_dis">
                                <div class="onoffswitch-active_ena_dis" >
                                  <div class="onoffswitch-switch_ena_dis">OFF</div>
                              </div>
           		               <div class="onoffswitch-inactive_ena_dis" >
                                  <div class="onoffswitch-switch_ena_dis">ON</div>
                               </div>
                       </div><!-- onoffswitch-inner_ena_dis-->
    </label>
    </div> <!--onoffswitch_ena_dis-->
                        
 	</div><!--.on_off_ena_dis_btn_profile_box-->
 </div><!--#on_off_ena_dis_btn_profile_box-->
 				<div id="privacy_ena_dis_det_box"> 
                <span id="privacy_ena_dis_det">Your profile is currently hidden</span>
                <span style="font-size:1em;">Visitors will see only your display name when you've hidden your profile. If you choose to be visible they will see everything you set as a public.</span>
                </div>
            </div><!-- privacy_ena_dis_box-->
            
              <hr />
         
       		<div id="privacy_edit_box">
            	 <div id="on_off_privacy_btn_box" >
       				<div class="on_off_privacy_btn_box">
        				<div class="onoffswitch_privacy">
         				<!--<input type="checkbox" name="onoffswitch_privacy" class="onoffswitch-checkbox_privacy" id=     	      	                         "myonoffswitch_privacy" checked>
                           <label class="onoffswitch-label_privacy" for="myonoffswitch_privacy">
                              <div class="onoffswitch-inner_privacy">
                                <div class="onoffswitch-active_privacy" >
                                  <div class="onoffswitch-switch_privacy">OFF</div>
                              </div>
           		               <div class="onoffswitch-inactive_privacy" >
                                  <div class="onoffswitch-switch_privacy">ON</div>
                               </div>
                       </div><!-- onoffswitch-inner_privacy
    </label>!-->
    </div> <!--onoffswitch_privacy-->
                        
 	</div><!--.on_off_privacy_btn_box-- run kar>
 </div><!--#on_off_privacy_btn_box!-->
 			
            
            <div id="privacy_ena_dis_det_box" style="margin-left:-1%;"> 
                <span style="color:#82ab00;">Your Profile Privacy Status</span>
                <select name="privacy_det" id="select_opt" name="select_opt" onchange="on_select(this.value)" disabled="disabled" style="margin-left:3%;">
                	<option value="1" id="Onlyme" >Only Me</option>
                    <option value="2" id="friends" >Friends</option>
                    <option value="3" id="friends_of_friends" >Friends Of Friends</option>
                </select>	
                </div>
        </div><!--Privacy_Edit_Box-->
            
          
            
           
            
        </div><!--main_cnt-->
        
       
        
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