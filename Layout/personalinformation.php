<?php
	//session_start ();
	require_once ('scripts_php/session.php');
	if (isset ($_SESSION['user_id']))
	 {?> 
		<script type="text/javascript">
            window.location.replace ('index.php');
        </script>
	 
	 <?php }
	
	if (isset ($_SESSION['user_reg_id']))
	 {
		 if (isset ($_SESSION['user_p_info_set']))
		  {?>

          	<script type="text/javascript">
				window.location.replace ('educationinformation.php');
			</script>
        <?php
		   }
		 require_once ('scripts_php/config.php');
		 $sql = "SELECT * FROM user_reg_tb WHERE pattern_id = '".$_SESSION['user_reg_id']."'";
		 $result = mysqli_query ($con,$sql);
		 $result = mysqli_fetch_array ($result);
		 $uname =  $result['first_name']." ".$result['last_name'];
		 
?>

 <html> 
 <head> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <title>Linked Zone</title>
  <style>
   body 
   {
	    background-repeat:no-repeat;
		background-attachment:fixed;
		padding:0;
        margin:0 auto;
		background-size:100% 100%;
		background-size:cover;
		background-color: #454545;

	} 
    </style>
	<script src="scripts/Jquery.js" type="text/javascript"> </script> 
    <script src="scripts/personal_information.js" type="application/javascript"></script>  
    <script src="scripts/validation_personalinfo.js"></script>
	<link rel="shortcut icon" href="images/symbol.png" />    
    <link rel="stylesheet" type="text/css" href="styles/personal.css"/>
</head>
<body>
<div id="mainheader">

	<div class="mainaux">
		<h1>
	        <a href="login.php">LinkedZone</a>
        </h1>
		<h2 style="margin-top:30px;">
            <a><?php echo $uname ?></a>
        </h2>
    </div>
</div>
  <div id="mainContainer">
		<span>
        	<div class="title">Personal Information</div>
        </span>
		<hr>
        
        <div id="formContainer">
      	 <form name="regForm"  method="post" action="scripts_php/personal_information.php" onSubmit="return newvalidate2()" >
                
                    <div class="node">
					   <label>Nationality</label>
                       <input type="text" name="nationality" placeholder="Indian/American"  maxlength="15" tabindex="1" />
                    </div>
                    <div class="node">
					   <label>Skill</label>
                       <input type="text" name="skill" placeholder="Programming" maxlength="25" tabindex="4" />
                    </div>
                    <div class="node">
					   <label>Hobbies</label>
                       <input type="text" name="hobbies" placeholder="Music"  maxlength="25" tabindex="2" />
                    </div>

                    <div class="node">
					   <label>Interest</label>
                       <input type="text" name="interest" placeholder="Sky Diving"  maxlength="25" tabindex="5" />
                    </div>
                    
                        
                    <div class="node">
					   <label>Relationship Status</label>

					   <select  name="rel_status"  id="r_status" tabindex="3" >
	                	<option value=" Select Your Gender " selected="selected">Relationship Status</option>
    	                <option value="1" >Married</option>
	                    <option value="0">Unmarried</option>
			           </select>
					</div>
                  <div class="err_node">
                   	<label id="error">Please Enter Proper Email Id</label>                  
				  </div>                   
                  <div class="node" style="clear:both; float:right; margin-right:3%;">
						<input type="submit" value="Next"  tabindex="6"/>
                  </div>

             </form>


        </div>	<!-- formContainer -->
    </div>	 <!-- mainContainer -->
        
           
 
</body>       
<?php
	 }
	 else
	 {
?>
<script type="text/javascript">
	window.location.replace ('registration.php');
</script>
<?php
	 }
?>
</html>


