<?php
	require_once ('scripts_php/session.php');
	require_once ('scripts_php/config.php');
	include ('/scripts_php/classes/class.user.php');
	
	if (isset ($_SESSION['user_id']))
	 {
		$u = new User ($_SESSION['user_id'] , 'user');
		//echo $u->isApproved();
		if ($u->isApproved() == 1)
		 {
//		$u -> initiate_notification();		
		$u -> fetch_all_post ();

?>    
<?php 

		 $cuser = $_REQUEST['user_id'];
		 
/*======================For Getting Perosnal Information Of USser==============================*/
		// $hobby="";
		// $skill="";
		 
		 $per = mysqli_query($con,"SELECT * FROM user_personal_tb WHERE pattern_id = '".$cuser."'");
		 $result = mysqli_fetch_array($per);
		 	
		 	$skill = $result['skill'];
			$hobby = $result['hobbie'];
			 $nationality = $result['nationality'];
			 $interest = $result['interest'];
			 $rel_status = $result['rel_status']==0? 1 : 2;
			 
			 
			 $query = mysqli_query($con,"SELECT * FROM user_reg_tb WHERE pattern_id = '".$cuser."'");
			 $row = mysqli_fetch_array($query);
			 $first_name = $row['first_name'];
			 $last_name = $row['last_name'];			 
			 $dob = $row['dob'];
			 $gender = $row['gender'];
			 $roll_no = $row['enrollment_no'];
			 $clg_year = substr ($roll_no , 0 , 1);
			 switch ($clg_year)
			  {
				  case 1 :
  					$clg_year = "First Year";
					break;
				  case 2 :
				  	$clg_year = "Second Year";
					break;

				  case 3 :
				  	$clg_year = "Third Year";
					break;

				  case 4 :
				  	$clg_year = "Fourth Year";
					break;

				  case 5 :
				  	$clg_year = "Fifth Year";
					break;
					
			  }
			 $user_id = $row['user_id'];
			 $gen = $gender=='1'?1:2;
			 
			 


			 
/*==========================For Getting Educational Information=================================*/
			 
				$edu = mysqli_query($con , "SELECT * FROM user_education_tb WHERE pattern_id = '".$cuser."'");			 
				$val = mysqli_fetch_array($edu);
		 
		 		$school_name = $val['school_name'];
				$college_name = $val['clg_name'];
				$stream = $val['stream'];
				$batch_year = $val['batch_year'];

				
				
	/*=================For Getting Contact Information=================================================*/			
		 
		 	$contact = mysqli_query($con , "SELECT * FROM user_security_tb WHERE pattern_id = '".$cuser."'");
			
			$cont_val = mysqli_fetch_array($contact);
			
			$phone_no = $cont_val['phono_no'];
		 
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
<link href="styles/aboutme.css" rel="stylesheet" type="text/css" />

<script src="scripts/jquery.js"></script>
<script src="scripts/ajax_script.js"></script>
<script src="scripts/my_post_div.js"></script>
<script src="scripts/facility_script.js"></script>
<script src="scripts/myScript.js"></script>
<script src="scripts/common_script.js"></script>

<script src="scripts/on_off_status.js"></script>

<script type="text/javascript">

var gen_val = -1;
var rel_val = -1;


$(document).ready(function(e) {

	/*		INITIATING USER DETAILS		*/
	gen_val = '<?php echo $gen;?>';

	rel_val = '<?php echo $rel_status; ?>';
	p = '<?php echo $u->user_details(); ?>';
	user = new User (p , 'user');
	user.set_user_details();
//	alert ('<?php echo $u->initiate_notification ();?>');
	$('#notification_text').html('<?php echo $u->initiate_notification() ?>');
	
	
	document.per_info.per_gender.options[gen_val].selected = true;
	document.per_info.per_rel.options[rel_val].selected = true;	
	
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
    	   
  	        <div id="about_all_activity">

				<div id="about_info_box">
        	<span>About <?php echo $first_name .' '. $last_name; ?></span>
            <span style="font-size:1em; color:#000; font-weight:500;">You can view Basic , Educational ,Contact Information here.</span>
        </div>

                <div id="personal_info_bx">
            <div id="personal_info_span_bx">
                	<span>Personal Information</span>
             </div>
             
             <div id="on_off_per_info_btn_box" >
      	 <div class="on_off_per_info_btn_box">
       			 <div class="onoffswitch_per_info">
         			<input type="checkbox" name="onoffswitch_per_info" class="onoffswitch-checkbox_per_info" id="myonoffswitch_per_info" checked>
           			<label class="onoffswitch-label_per_info" for="myonoffswitch_per_info">
           			  <div class="onoffswitch-inner_per_info">
                             <div class="onoffswitch-active_per_info" onclick="per_info_disable()" >
                                 <div class="onoffswitch-switch_per_info">OFF</div>
                             </div>
                             <div class="onoffswitch-inactive_per_info" onclick="per_info_enable()" >
                                    <div class="onoffswitch-switch_per_info">ON</div>
                            </div>
					     </div><!-- onoffswitch-inner_per_info-->
    </label>
			    </div> <!--onoffswitch_per_info-->
                        
		 	</div><!--.on_off_per_info_btn_box-->
 </div><!--#on_off_per_info_btn_box-->
             
             
             
             <div id="user_info_box">
 
            <form name="per_info" method="post">
                <br />
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span> Skill</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="skill" id="skill" value="<?php echo $skill; ?>" disabled="disabled" />
                    </div>
                </div>
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    
                    	<span>Hobby</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="hobby" id="hobby" value="<?php echo $hobby; ?>" disabled="disabled"  />
                    </div>
                </div>
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span>Nationality</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="nationality" id="nationality" value="<?php echo $nationality; ?>" disabled="disabled"  />
                    </div>
                </div>
                
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span>Interest</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="interest" id="interest" value="<?php echo $interest; ?>" disabled="disabled" />
                    </div>
                </div>
                
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span>Dob</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="dob" id="dob" value="<?php  echo $dob ; ?>" disabled="disabled"/>

                        
                    </div>
                </div>
                
                 <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span>Gender</span>
                    </div>
                    <div class="text_box">
						<select name="per_gender" onchange="get_per_gender(this)" id="sel_gen" disabled="disabled">
                        	<option value="-1">Select Gender</option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                    	
                    </div>
                </div>
                
                
                 <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span>Marital Status</span>
                    </div>
                    <div class="text_box">
						<select name="per_rel" onchange="get_per_rel(this)" id="sel_rel" disabled="disabled">
                        	<option value="-1">Select Marital Status</option>
                            <option value="1">Unmarried</option>
                            <option value="0">Married</option>
                        </select>
                    
                    </div>
                </div>
                
                
           </div><!--user_info_box-->
        
        
        <div id="error_box">
        	<span id="per_info_err_det"></span>
        </div>
        <div class="save_cancel_box">
                <div class="save_button_box">
                   <input type="button" name="save" id="per_save_btn" value="Save Changes" onclick="per_info_validate()" disabled="disabled"/>
                    
                </div>
                
                <div class="cancel_button_box">
                     <input type="reset" name="cancel" id="cancel_per_info" value="Cancel" disabled="disabled" />
                 </div>
        </div>
        </form>	

                    
        </div><!--personal_info_bx-->	
        
        
        
        
        
        
        
        
        
        	<div id="personal_info_bx" style="margin-top:1%;">
            <div id="personal_info_span_bx">
                	<span>Educational Information</span>
             </div>
                 <br />
     
     
     
     
     <div id="on_off_edu_info_btn_box" style="visibility:hidden;" class="per_on_off" >
      	 <div class="on_off_edu_info_btn_box">
       			 <div class="onoffswitch_edu_info">
         			<input type="checkbox" name="onoffswitch_edu_info" class="onoffswitch-checkbox_edu_info" id="myonoffswitch_edu_info" checked>
           			<label class="onoffswitch-label_edu_info" for="myonoffswitch_edu_info">
           			  <div class="onoffswitch-inner_edu_info">
                             <div class="onoffswitch-active_edu_info" onclick="edu_info_disable()" >
                                 <div class="onoffswitch-switch_edu_info">OFF</div>
                             </div>
                             <div class="onoffswitch-inactive_edu_info" onclick="edu_info_enable()" >
                                    <div class="onoffswitch-switch_edu_info">ON</div>
                            </div>
					     </div><!-- onoffswitch-inner_edu_info-->
    </label>
			    </div> <!--onoffswitch_edu_info-->
                        
		 	</div><!--.on_off_edu_info_btn_box-->
 </div><!--#on_off_edu_info_btn_box-->     
     
 
 
 		<div id="user_info_box">
        	<form name="edu_info" method="post">
            
        		                <br />
                                
                                
                                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span> Roll Number</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="roll_no" id="roll_no" value="<?php  echo $roll_no ;  ?>" disabled="disabled" />
                    </div>
                </div>
                
                
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span> School Name</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="school" id="school" value="<?php echo $school_name ; ?>" disabled="disabled" />
                    </div>
                </div>
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    
                    	<span>College Name</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="college" id="college" value="<?php echo $college_name ;?>" disabled="disabled"  />
                    </div>
                </div>
                
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    
                    	<span>Stream</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="stream" id="stream" value="<?php echo $stream ; ?>" disabled="disabled"  />
                    </div>
                </div>
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span>Batch Year</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="clg_year" id="batch_year" value="<?php echo $batch_year ; ?>" disabled="disabled"  />
                    </div>
                </div>
                
                
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span>College Year</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="clg_year" id="clg_year" value="<?php echo $clg_year ; ; ?>" disabled="disabled"  />
                    </div>
                </div>
                   
            
        </div><!--user_info_box-->
        
        
        <div id="error_box">
        	<span id="edu_info_err_det"></span>
        </div>
        <div class="save_cancel_box" style="visibility:hidden;">
                <div class="save_button_box">
                    <input type="button" name="save" id="edu_save_btn" value="Save Changes" disabled="disabled" onclick="edu_info_validate()"  />
                </div>
                
                <div class="cancel_button_box">
                     <input type="reset" name="cancel" id="cancel_edu_info" value="Cancel" disabled="disabled" />
                 </div>
        </div>
        </form>
                    
        </div><!--personal_info_bx-->
        
        
        
        
        
        
        
        
        
        
        	<div id="personal_info_bx" style="margin-top:1%;">
            <div id="personal_info_span_bx">
                	<span>Contact Information</span>
             </div>
                 <br />
     
     
     <div id="on_off_cont_info_btn_box" >
      	 <div class="on_off_cont_info_btn_box">
       			 <div class="onoffswitch_cont_info">
         			<input type="checkbox" name="onoffswitch_cont_info" class="onoffswitch-checkbox_cont_info" id="myonoffswitch_cont_info" checked>
           			<label class="onoffswitch-label_cont_info" for="myonoffswitch_cont_info">
           			  <div class="onoffswitch-inner_cont_info">
                             <div class="onoffswitch-active_cont_info" onclick="cont_info_disable()" >
                                 <div class="onoffswitch-switch_cont_info">OFF</div>
                             </div>
                             <div class="onoffswitch-inactive_cont_info" onclick="cont_info_enable()" >
                                    <div class="onoffswitch-switch_cont_info">ON</div>
                            </div>
					     </div><!-- onoffswitch-inner_cont_info-->
    </label>
			    </div> <!--onoffswitch_cont_info-->
                        
		 	</div><!--.on_off_cont_info_btn_box-->
 </div><!--#on_off_cont_info_btn_box--> 
     
 
 
 		<div id="user_info_box">
        	<form name="contact_info" method="post">
            
        		                <br />
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span> User Id</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="user_id" id="user_id" value="<?php echo $user_id; ?>" disabled="disabled" />
                    </div>
                </div>
                
                
                <div class="user_det_box">
                	<div class="user_det_span_box">
                    	<span> Contact Number</span>
                    </div>
                    <div class="text_box">
                    	<input type="text" name="contact" id="contact" maxlength="10" value="<?php echo $phone_no ; ?>" disabled="disabled" />
                    </div>
                </div>
                
                   
            
        </div><!--user_info_box-->
        
        
        <div id="error_box">
        	<span id="cont_info_err_det"></span>
        </div>
        <div class="save_cancel_box">
                <div class="save_button_box">
                    <input type="button" name="save" id="save_cont_info" value="Save Changes" disabled="disabled" onclick="cont_info_validate ()" />
                </div>
                
                <div class="cancel_button_box">
                     <input type="reset" name="cancel" id="cancel_cont_info" value="Cancel" disabled="disabled" />
                 </div>
        </div>
        </form>
                    
        </div><!--personal_info_bx-->

       
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



