<?php 
require_once ('scripts_php/session.php');
//require_once ()
if (isset ($_SESSION['user_id']))
 {
 ?>
	<script type="text/javascript">
			window.location.replace('index.php');
	</script>
<?php
 }
 
else
 {
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Linked Zone </title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/symbol.png" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link href="styles/registration.css" type="text/css" rel="stylesheet" />
<script src="scripts/jquery.js"></script>
<script src="scripts/validation_reg.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
  $(document).ready(function() {

	document.regForm.first_name.focus ();
    $( "#datepicker" ).datepicker( {
		dateFormat : 'yy-mm-dd'

		});
  
 });
</script>
</head>

<body>	
<div id="header" style="background:rgba(0,0,0,0.7);">
	<div id="logo" style="margin-top:15px; opacity:1,5;">Linked Zone</div>
    <a href="login.php" style="font-weight:600;"><span>LogIn</span></a>
</div>
<div id="header_strip" style="opacity:0.8;"></div>


  
    <div id="mainContainer">
		<span>
        	<div class="title">Sign Up</div>
            <div class="subTitle">Be free to link , Join now.</div>
        </span>
        <div id="formContainer">
      	 <form name="regForm"  method="post"  > 
             <!--    <form name="regForm"  action="scripts_php/registration.php"  method="post" onSubmit="return newvalidate()">-->
                    <div class="node">
					   <label>First Name</label>
                       <input type="text" name="first_name" tabindex="1" />
                    </div>
                    <div class="node">
					   <label>Password</label>
                       <input type="password" name="password" tabindex="5" />
                    </div>
                    <div class="node">
					   <label>Last Name</label>
                       <input type="text" name="last_name" tabindex="2" />
                    </div>

                    <div class="node">
					   <label>Confirm Password</label>
                       <input type="password" name="cPass" tabindex="6" />
                    </div>
                    
                    <div class="node">
					   <label>Email Id</label>
                       <input type="text" name="user_id" tabindex="3"/>
                    </div>
                        
                    <div class="node">
					   <label>Gender</label>

					   <select  name="gender"  id="gen" tabindex="7" >
	                	<option value=" Select Your Gender " selected="selected">Select Your Gender</option>
    	                <option value="1" >Male</option>
	                    <option value="0"> Female</option>
			           </select>
					</div>
                    <div class="node" style=" clear:both;float:left;">
					   <label>Roll Number</label>

                       <input type="text" name="enrollment_no" tabindex="4"/>              
                       
                    </div>
                  <div class="node">
					  <label>Birth Date</label>
                       <input type="text" name="dob" id="datepicker"  tabindex="8"/>
                  </div> 
                  <div class="err_node">
                   	<label id="error">Please Enter Proper Email Id</label>                  
				  </div>                   
				  <div class="node" style="margin-left:0%; clear:both; float:inherit; display:table;margin:0 auto; font-size:16px ; font-weight:bold; color: #D9F733;" >
                    	<label> By clicking on  <B>Create Account</B> you are agreed with <a href="disclaimer.php" style="color: #D9F733">terms & condition</a>.</label>
                  </div>
                  <div class="nodeDet" style="clear:both; margin-bottom:3%;">
						<input type="button" onClick="newvalidate ()" value="Create Account"/>
                    	<!--<input type="submit"	value="Create Account" />-->
                  </div>

             </form>


        </div>	<!-- formContainer -->
    </div>	 <!-- mainContainer -->
    <div id="Intro_Footer">
	    <div id="header_strip"  style="box-shadow:0px -1px 2px black;"></div>
        <div id="footer">&copy; Copyright @Linked Zone</div>
   </div> <!-- Intro_Footer Ends...-->
</body>
</html>
<?php }?>