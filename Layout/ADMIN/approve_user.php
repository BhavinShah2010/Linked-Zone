<?php 

	require_once('scripts_php/session.php');
	require_once('scripts_php/config.php');
	include ('../scripts_php/classes/class.user.php');
	if (isset ($_SESSION['user_id']))
	 {
		$u = new User ($_SESSION['user_id'] , 'admin');
		
		$query = "SELECT pattern_id, first_name , user_id , last_name FROM user_reg_tb ORDER BY first_name ASC ";	
		$result = mysqli_query($con,$query);
		
	 	//ini_set('max_execution_time' , 300)	;
?>


<?php
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/symbol.png" />
<link  href="styles/admin_main.css"  type="text/css" rel="stylesheet"/>
<link  href="styles/admin_header.css"  type="text/css" rel="stylesheet"/>
<link href="styles/popup_window.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="styles/prism.css">
<link rel="stylesheet" href="styles/chosen.css">
<link rel="stylesheet" href="styles/approve_user.css" />

<link rel="stylesheet" type="text/css" href="styles/jquery.dataTables.css" />
<link rel="stylesheet" type="text/css" href="styles/jquery.dataTables_themeroller.css" />
<link rel="stylesheet" type="text/css" href="styles/demo_table.css" />
<link rel="stylesheet" href="styles/admin.css" />


<script src="../scripts/my_post_div.js"></script>
<script src="scripts/jquery.js"></script>
<script src="scripts/common.js"></script>
<script src="scripts/chosen.jquery.js"></script>
<script src="scripts/prism.js"></script>

<script type="text/javascript">



var user;


//$(document).ready(function(e) {

	/*		INITIATING USER DETAILS		*/
	
	p = '<?php echo $u->user_details(); ?>';
	var user = new User (p , 'admin');
	user.set_user_details();
	

$(document).ready(function(e) {
	flag = true;
    	$('#right_slider_btn').click(function (){
       	
            if (flag)
			 {
				$('#main').animate({width:'60%'});
				$('#right_slider').animate({width:'20%'});
				flag = false;
			 }
			else
			 {
				$('#main').animate({width:'80%'});
				$('#right_slider').animate({width:'0%'});
				
				
				$('#noti_back_btn').css('display' , 'none');
				$('#notify_box').css('display' , 'none');
				$('#mesgs').animate({marginLeft:'0%'});
				$('#frnd_req').animate({marginLeft:'0%'});
				
				
				$('#msg_back_btn').css('display' , 'none');
				$('#right_sli_mesg_box').css('display' , 'none');
				
				
				flag = true;
			 }
			 
			});
    });
		
	//var x = document.getElementsByClassName("chosen-container chosen-container-multi");
	//document.getElementsByClassName("chosen-container chosen-container-multi").item(0).style.width = "100%";

</script>

<script src="scripts/jquery.dataTables.js"></script>
<script>
	  $(function () {
            $('#DelUser').dataTable({
                
                "sPaginationType": "full_numbers",
				"bStateSave": true
				
            });
	  });
</script>

<title>Linked Zone</title>
</head>

<body >


<div id="after_mesg_sent_box">
 	<div id="success_box">
    	<span>Success</span>
    </div>
    
    <hr />
    <div id="msg_info_box">
    	<span>your message has been sent sucessfully.</span>
    </div>
 </div><!-- after_mesg_sent_box-->

<div id="popup_window">
            	<div id="popup_header">	
                <div id="close_popup"></div>
                	<span>New Message</span>
                </div>
                
                <hr />
                
                <div id="to_msg_cnt">
                	<div id="det_box">
                    	<span>To</span>
                    </div><!-- det_box-->
                    	
                        <div id="input_box">
                    
                    	<select multiple class="chosen-select-no-results">
        	
            <?php
				while($row = mysqli_fetch_array($result))
				{
					$name = $row["first_name"] . " " . $row["last_name"];
					$id = $row['user_id'];
					
			?>
             <option value=" <?php echo $row["pattern_id"]; ?> "><?php echo $name . '( ' .$id.')'; ?></option>
           	<?php
				}
			?>
          </select>
             </div><!--input_box-->
                    
              </div><!--to_msg_cnt-->
            <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'No Result Found For : '},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);   
    }
  </script>
              
              <div id="msg_box">
	              <div id="msg_det_box">
    	          	<span>Message</span>
              </div><!--msg_det_box-->
                  <div id="msg_textarea_box">
                  <form name="msg_send" >
                  	<textarea name="mesg" id="msg"></textarea>
                    </form>
                  </div><!-- msg_textarea_box-->
              </div><!-- msg_box-->
              
              <div id="attach_box">
              	
                	
                    <div class="icon_box">
                    <form action="" enctype="multipart/form-data" method="post" >
                    	<input type="file" name="msg_img" id="msg_img" style="display: none;" />
                    
                        <img src="images/msg_attach_photo.png" onclick="document.getElementById('msg_img').click();" />
                        
                        </form>
                    </div><!--icon_box-->
               
               			 <div id="progress_bar_box"></div>
                
              </div><!-- attach_box-->
              <hr />
              
              <div id="btn_box" >
              	<div id="right_btn_box">
               
                	<input type="button" name="cancel" id="cancel" value="Cancel" style="background:#82ab00;" />
                   
                    <input type="button" name="send" id="send" value="Send" onclick="addmesg()"/>
                    </form>
                </div>
              </div>
     </div><!--Popup Window-->
     
    
     
<div id="main_box" ></div>
 


	<div id="container" data-role="none">
    	<div id="header">
        	<h1 class="logo"> Linked Zone </h1>
            <div id="c_bar">
                <div id="noti_btn"></div>                                        
                <div id="right_slider_btn"></div>            
            	<div class="p_ow_name"><a href="#">Welcome,<script>document.write (cusername)</script></a>   
               		 <div id="a_pull_down">
                     	<a href="admin_settings.php" id="setting">                      
		                   <div class="a_p_btn">
                                  Settings
                           </div>
					    </a>                           
                            <hr />                            
                       	<a  href="scripts_php/admin_logout.php">                            
							<div class="a_p_btn">                            
                                  Logout
                            </div>
                        </a>    
                     </div>
                </div>
                <div class="p_ow_pic">
                	<img src="all_admin_img/user_<?php echo $_SESSION['user_id']?>/profile_pic.jpg"/>
                </div>

            </div>
            
           
        </div> <!-- header -->
        <div id="left_slider">
        	<a href="index.php">
            
               	 <div class="button" >
                
                    <div class="icon" id="dash_icon">
                  	  <img src="images/icons/dashboard.png" />
                    </div>
                    
                    <div class="text" id="dash_text">Dashboard</div>
            </a>
                    
                    <div id="dash_arrow_box"></div>
                  
                    <div class="dashboard_dropdown_box">
                   		 <hr />
                         <!-- <a href="user.php">
                   		 <div class="btn" id="user">
                        	 <div class="icon">
		                  	 <img src="images/User1.png" />
        		            </div>
                       		<div class="text" >User</div>
                       
                        </div>
                        </a>-->
                        
                       
                   <a href="total_users.php">
                        <div class="btn">
                        	 <div class="icon">
		                  	  	<img src="images/icons/Total_User.png" />
        		            </div>
                            
                       		<div class="text">Total User</div>
                           
                       
                        </div>
                   </a>
                   
                   <a href="active_users.php">
                    	<div class="btn">
                        	 <div class="icon">
		                  	  <img src="images/icons/Active(Online)_User.png"/>
        		            </div>
                       		<div class="text" >Active User</div>
                       
                        </div>
                   </a>
                   
                   	<a href="inactive_users.php">
                        <div class="btn">
                        	 <div class="icon">
		                  	  <img src="images/icons/InActive(Offline)_User.png"/>
        		            </div>
                       		<div class="text">InActive User</div>
                       
                        </div>
                        </a>
                          <hr />
                    
                    </div>
                    
                </div>
				
				
				
				
				
				<a href="#">
			<div class="button" id="manage_report">
            	<div class="icon" id="manage_report_icon">
                	<img src="images/icons/manage_report.png" />
                </div>
                <div class="text" id="manage_report_text">Manage Report</div>
                <div id="manage_report_arrow_box"></div>
                
                 <div class="manage_report_dropdown_box">
                 <hr />
                   		 
                   
                         
                  <a href="generate_report.php">
                   		 <div class="btn">
                        	 <div class="icon">
		                  	 <img src="images/icons/Generate_Report.png">
        		            </div>
                       		<div class="text" >Generate Report</div>
                       
                        </div>
                  </a>
                        
                        
                   <a href="view_report.php">
                        <div class="btn">
                        	 <div class="icon">
		                  	 <img src="images/icons/View_Report.png"/>
        		            </div>
                       		<div class="text" >View Report</div>
                       
                        </div>
                    </a>
                        
                        
                        <hr />
                        </div>

            </div>
           </a>
                
                
                 
                 
                 
                 
        	<!--<a href="post_image.php">           
			<div class="button" id="post_image">
            	<div class="icon">
	                <img src="images/image_a_post.png" />
                </div>
                <div class="text">Post Image</div>
            </div>
           </a>            
        	<a href="post_text.php">
			<div class="button" id="post_text">
            	<div class="icon"  >
                	<img src="images/text_a_post.png" />
                </div>
                <div class="text">Post Text</div>
                
            </div>
           </a>-->
           
           
           <a href="#">
			<div class="button" id="post">
            	<div class="icon" id="post_icon">
                	<img src="images/icons/Post.png" />
                </div>
                <div class="text" id="manage_post_text">Post</div>
                <div id="post_arrow_box"></div>
                
                 <div class="post_dropdown_box">
                 <hr />
                   		 
                   
                         
                  <a href="admin_post.php">
                   		 <div class="btn">
                        	 <div class="icon">
		                  		 <img src="images/icons/Create_Post.png">
        		            </div>
                       		<div class="text" >Create New Post</div>
                       
                        </div>
                  </a>
                        
                        
                   <a href="manage_post.php">
                        <div class="btn">
                        	 <div class="icon">
		                  	 <img src="images/icons/Manage_Post.png"/>
        		            </div>
                       		<div class="text" >Manage Post</div>
                       
                        </div>
                    </a>
                        
                        
                        <hr />
                        </div>

            </div>
           </a>
           
           
           
        	<a href="#">
			<div class="button" id="manage_user">
            	<div class="icon" id="manage_icon">
                	<img src="images/icons/manage_user.png" />
                </div>
                <div class="text" id="manage_text">Manage Users</div>
                <div id="manage_user_arrow_box"></div>
                 <div class="manage_user_dropdown_box ">
                   		 <hr />
                         
                         <a href="approve_user.php">
                   		 <div class="btn">
                        	 <div class="icon">
		                  	 <img src="images/icons/Add_User.png"/>
        		            </div>
                       		<div class="text" >Approve User</div>
                       
                        </div>
                        
                        </a>
                        <a href="delete_user.php">
                        <div class="btn">
                        	 <div class="icon">
		                  	 <img src="images/icons/Delete_User.png"/>
        		            </div>
                       		<div class="text" >Remove User</div>
                       
                        </div>
                        </a>
						
						
						
						
						<a href="block_user.php">
                        <div class="btn">
                        	 <div class="icon">
		                  	 <img src="images/icons/Block_User.png"/>
        		            </div>
                       		<div class="text" >Block User</div>
                       
                        </div>
                    </a>
					
					
                        <hr />
                        </div>

            </div>
           </a>

           
           <a href="#" id="open_window">
           
			<div class="button" id="send_message">
            	<div class="icon"  >
                	<img src="images/icons/send_message.png" />
                </div>
                <div class="text" >Send Message</div>
                
             
            </div><!-- send message-->
           </a>
           
           
        <a href="calender.php" id="calender">
           
			<div class="button" id="cal">
            	<div class="icon"  >
                	<img src="images/icons/Calender.png" />
                </div>
                <div class="text" >Calender</div>
                
             
            </div><!-- calender -->
           </a>
           
            
            
        </div> <!-- left slider -->       
        
        
        <div id="main">
        
        <div id="title">
        	<span>Approve/DisApprove Users</span>
        </div>
        	 
        	<!--<div id="main_container">
            	
                
                <div id="title_box">
                <div id="search_box">
                <input type="text" name="user_seach" id="user_search" class="user_search" placeholder="Search User To Block" style="min-height:1.5em;"/>
                	
                    
                </div>
				 <table>
                
                <tr>
                	<th>Want to delete?</th><td><td><td>
                	<th><td><td><td><td><td><td><td><td style="font-weight:700;">User Name</td></td></td></td></td></td></td></td></th>
                </tr>
                  
                </table>

              
                <hr />
                </div><!--title_box--
                
                
                
                <div id="block_ans_box">
                
                <table>
                

				?php
				
				
				$sql = mysqli_query($con,"select * from user_reg_tb") or die("error");
				
				while($data = mysqli_fetch_array($sql))
				{
					echo '<tr>';
					echo '<td><td><td><td><td><td><td><td><td><td><input type="checkbox" style="margin-top:5px;" id="check" name ="user" value ="'.$data['pattern_id'].'"</td></td></td></td></td></td></td></td></td></td>';
					
					echo '<td style="margin-left:5px;"><td><td><td><td><td><td><td><td><td><td><td><td><td><td><td><td><td><td><td>'.$data['first_name'].' '.$data['last_name'].'</td></td></td></td> '.'<td><td><td><td style="float:"right;">'.$data['user_id'].'</td></td></td></td>';
					
					//echo '<td><input type="checkbox" id="check" name="user" value="'.$data['pattern_id'].'"></td>';
					
					
					echo '</tr>';
					
				}
				
				?>
               </table>
               
               </div><!--block_ans_box--
               <hr />
               
               <div id="block_btn_box">
               		<div id="block_box">
                       <table>
                        <tr>
                        
                            <td></td>
                            <td><input type="button" value="Block User" class="block_btn"/></td>
                        </tr>
                        </table>
               		 </div>
                </div><!-- block_btn_box--
                                
                
                
                
            </div><!-- main_container-->
            
             <div id="main_container">
            	<table id="DelUser">
	<thead>
	<tr align="justify" style="color:#82ab00;">
    	<th>Want to Delete?</th>
        <th>User Name</th>
        <th>User ID</th>
        <th>Profile Pic</th>
    </tr>
    
	</thead>
<tbody>
	<?php
    
    $sql = mysqli_query($con,"SELECT * from user_reg_tb where approve_status = 0 ") or die("error");
	//$sql1 = mysqli_query($con,"select * from  ");
    while($data = mysqli_fetch_array($sql))
    {
		        echo '<tr id="del_id_'.$data['pattern_id'].'">';
			echo '<td align="justify"  ><input type="checkbox" id="check" name ="user" value ="'.$data['pattern_id'].'"</td>';
								   
					echo '<td align="justify"><a style="text-decoration:none;" href="../profile.php?profile_user="'.$data['pattern_id']. '>'.$data['first_name'].' '.$data['last_name'].'</a>'.'<td align="justify">'.$data['user_id'].'</td>';
					//echo '<td>'.$data['block_status'].' </td>';
					echo '<td><img src="..\all_user_img\user_'.$data['pattern_id'].'\profile_pic.jpg" height=25 width=25/></img></td>';
			   
				echo '</tr>';                
    }

    ?>
</tbody>
</table>

<!-- Akhtra Div for getting Hr-->
			<div style="width:100%;height:60px; margin-top:10px;">
            	<div style="width:100%;height:10px;border-top:1px solid #ccc;"></div>
            	
            </div>
					<div style="width:100%;height:10px;border-top:1px solid #ccc;"></div>
                         
            </div><!--main_container-->
            <div id="approve_box">
            	<div id="approve_btn_box">
                	 <input type="button" value="Disapprove User" class="disapprove_btn"/>
                    <input type="button" value="Approve User" class="approve_btn"/>
                    
                </div>
              </div>
              </div><!--main-->
              
              
              
        <div id="right_slider">
        	<div class="button" id="noti" >Notification
            	<div class="back_btn_box" id="noti_back_btn">   </div>
            </div>
            	<div id="notify_box">
                	<div class="get_notification_box">
                    	<div class="noti_image_box">
                        	<img src="all_user_img/user_1/profile_pic.jpg"/>
                        </div>
                        <div class="noti_content_box">
                        	<span>Harsh Soni liked your post</span>
                        </div>
                    </div>
                    <div class="get_notification_box">
                    	<div class="noti_image_box">
                        	<img src="all_user_img/user_3/profile_pic.jpg" />
                        </div>
                        <div class="noti_content_box">
                        	<span>Adit Fadia commented on your post</span>
                        </div>
                    </div>
                    <div class="get_notification_box">
                    	<div class="noti_image_box">
                        	<img src="all_user_img/user_2/profile_pic.jpg"  />
                        </div>
                        <div class="noti_content_box">
                        	<span>Bhavin Shah commented on your post</span>
                        </div>
                    </div>
                    <div class="get_notification_box">
                    	<div class="noti_image_box">
                        	<img src="all_user_img/user_4/profile_pic.jpg"  />
                        </div>
                        <div class="noti_content_box">
                        	<span>Sagar Trivedi liked on your post</span>
                        </div>
                    </div>
                    <div class="get_notification_box">
                    	<div class="noti_image_box">
                        	<img src="all_user_img/user_6/profile_pic.jpg" />
                        </div>
                        <div class="noti_content_box">
                        	<span>Hardik Darji liked  your post</span>
                        </div>
                    </div>
                    <div class="get_notification_box">
                    	<div class="noti_image_box">
                        	<img src="all_user_img/user_68/Maulin.jpg" />
                        </div>
                        <div class="noti_content_box">
                        	<span>Maulin Shah liked  your post</span>
                        </div>
                    </div>
                    
                    
                </div><!-- notify_box-->
        	<!--<div class="button" id="mesgs">Messages
            	<div class="back_btn_box" id="msg_back_btn"></div>
                
            </div>
            <div id="right_sli_mesg_box">
            	<div class="get_msgs_box"></div>
                <div class="get_msgs_box"></div>
                <div class="get_msgs_box"></div>
                <div class="get_msgs_box"></div>
            </div>
            
            
        	<div class="button" id="frnd_req">Friend Requests</div>-->                  
        </div> <!-- right -->
        
                
    </div> <!-- container -->
    
     
</body>


</html>


<?php   
}
else
 {
	?>
		<script type="text/javascript">
        	window.location.replace('admin_login.php');
        </script>
    <?php  
	 
	 
 }
?>