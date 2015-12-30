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
		 if (isset ($_SESSION['user_e_info_set']))
		  {?>

          	<script type="text/javascript">
			window.location.replace ('securityinformation.php');
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
     <script src="scripts/validation_educationalinfo.js"></script>
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
        	<div class="title">Educational Information</div>
        </span>
		<hr>
        
          <div id="formContainer" style="position:relative;">
      	 <form name="eduForm"  method="post" action="scripts_php/educationinfo.php" onSubmit="return newvalidate2()" >
                    <div class="node">
					   <label>School Name</label>
                       <input type="text" name="school_name" maxlength="50" placeholder="XYZ School" tabindex="1" />
                    </div>
                    <div class="node">
					<!-- <label>College Name</label> -->
                       <input type="hidden" name="college_name"  maxlength="50" value="KS School Of Business Management" tabindex="2" />
                    </div> 
                    <div class="node" style="clear:both;float:left;">
					   <label>Stream</label>
                       <input type="text" name="stream" placeholder="MSCIT/MBA"  maxlength="5" tabindex="3" />
                    </div>

                    <div class="node">
					   <label>Batch Year</label>
					   <select  name="batch_year"  id="b_year" tabindex="4" >
	                	<option value="0" selected="selected">Select Year</option>
    	                <option value="2009" >2009</option>
	                    <option value="2010"> 2010</option>
	                    <option value="2011"> 2011</option>                        
	                    <option value="2010"> 2012</option>
	                    <option value="2013"> 2013</option>                                                
			           </select>
                    </div>
                    
                  <div class="err_node">
                   	<label id="error">Please Enter Proper Email Id</label>                  
				  </div>                   
                  <div class="node" style="clear:both; float:right; position:absolute; bottom:-25%; right:3%;">
						<input type="submit" value="Next" tabindex="3"/>
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


  
