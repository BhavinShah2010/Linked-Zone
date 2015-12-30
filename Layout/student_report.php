<?php
	require_once ('/scripts_php/session.php');
	include ('/scripts_php/classes/class.user.php');
	if (isset ($_SESSION['user_id']))
	 {
		$u = new User ($_SESSION['user_id'] , 'user');
//		$u -> initiate_notification();		
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
<link href="styles/student_report.css" rel="stylesheet" type="text/css" />

<link href="styles/demo_table.css" rel="stylesheet" type="text/css" />
<link href="styles/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="styles/jquery.dataTables_themeroller.css" />

<script src="scripts/jquery.js"></script>
<script src="scripts/ajax_script.js"></script>
<script src="scripts/my_post_div.js"></script>
<script src="scripts/facility_script.js"></script>
<script src="scripts/myScript.js"></script>



<script src="scripts/jquery.dataTables.js"></script>
<script>
	  $(function () {
            $('#Report').dataTable({
                
                "sPaginationType": "full_numbers",
				"bStateSave": true
				
            });
	  });
</script>




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
           
            <div id="report_container">
            	<table id="Report">
   <thead>
	<tr align="justify" style="color:#82ab00; margin-top:1%;">
    	
        <th>Report No</th>
        <th>Report Name</th>
        <th>Report Type</th>
        <th>Report Time</th>
        <th>Report Year</th>
        <th>Report Details</th>
    </tr>
    
	</thead>
    
    
    <tbody>
    
    <?php
			$obj_report = new report ();
			
			$result = $u->get_student_reports($u->get_clg_year());
			$i = 1;

			while ($row = mysqli_fetch_array ($result))
			 {
				 //echo "Report Id : ".$row['report_id']."<br>";
				 
				 $obj_report->get_report ($row['report_id']);
				 $details = $obj_report->get_report_parameters();
				 $details = explode(";" , $details);
				 $report_id = $details[0];
				 $report_owner_id = $details[1];
				 $report_type = $details[2] == 1 ?"Attendence Report":"Result";
				 $report_name = $details[3];
				 $for_year = $details[4];
				 $sum = explode ("/*+-" , $details[5]) ;
				 $report_time = $sum[0];
				 $report_details = "About Attendance Report";	
					// echo "Report Counter:".$i."<br>";
					// echo 'Report Name:<a href="student_report_view.php?file_name='.$report_name.'&user_id='.$report_owner_id.'"	 target="_blank">'.$report_name."</a><br>";
					// echo "Report Type:".$report_type."<br>";			 
					 //echo "Report Time:".$report_time."<br>";
					// echo "Report For Year : ".$for_year."<br>";
					// echo "Report Details:".$report_details."<br>";
					 
					
					 
					 
					 
					 echo '<tr>';
					 echo '<td style="color:#FFF;">' .$i.'</td>';
					 
					 
					 echo '<td>'; 
					 echo '<a href="student_report_view.php?file_name='.$report_name.'&user_id='.$report_owner_id.'"	 target="_blank">'.                         $report_name."</a>";
	
					 echo '</td>';
					 
					 echo '<td>' .$report_type.'</td>';
					 
					 echo '<td>' .$report_time.'</td>';
					 
					 
					 echo '<td>' .$for_year. '</td>';
					 
					 echo '<td>' .$report_details.'</td>';
					 
					 
					 echo'</tr>';
					 
					 $i++;
					 
					 
				
			
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
           <!-- <div id="delete_report_box">
            	<div id="delete_report_btn_box">
                    <input type="button" value="Delete Report" class="delete_report_btn"/>
                </div>
              </div>-->
                
            </div><!--Report_Container-->
            
            
            <div>        <!-- mainContainer -->
        
   </div>	<!-- mainOuter-->
  
</div>

</body>
</html>
<?php   
}

else
 {
	?>
		<script type="text/javascript">
        window.location.replace('login.php');
        </script>
    <?php  
	 
	 
 }
?>


