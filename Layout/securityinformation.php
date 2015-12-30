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
		 if (isset ($_SESSION['user_s_info_set']))
		  {?>

          	<script type="text/javascript">
				window.location.replace ('imageupload1.php');
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
    <script src="scripts/validation_sequrityinfo.js"></script>
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
        	<div class="title">Security Information</div>
        </span>
		<hr>
        
        <div id="formContainer">
           <form name="seqForm"  action="scripts_php/security_info.php"  method="post" onSubmit="return newvalidate3()">
                 
                    <div class="node">
                          <label>Security Question</label>
                     
                           <select  name="sec_que" id="s_que" placeholder="Enter Youur reletion status"  tabindex="1">
                            <option value=" Select Your Question " selected="selected">Select Your Question</option>
                            <option value=" Enter your Favourite Actor ">  Enter your Favorite Actor</option>
                            <option value=" Enter your Favourite Actoress "> Enter your Favorite Actress</option>
                            <option value=" Enter your School Name "> Enter your School Name</option>
                          </select>
                     
                    </div>
                    <div class="node" style="clear:both;">
                          <label>Answer</label>
							<input type="text"  name="seq_que_ans" maxlength="15"  placeholder="Enter Your Answer" tabindex="2" />
                    </div>

                    <div class="node">
                          <label>Phone number</label>
							<input type="text" name="phone_no"  maxlength="10" placeholder="Enter Your Phonenumber" tabindex="3"/>
                    </div>
                    
                        
                  <div class="err_node">
                   	<label id="error">Please Enter Proper Email Id</label>                  
				  </div>                   
                  <div class="node" style="clear:both; float:right; margin-right:3%;">
						<input type="submit"	value="Next" tabindex="6"/>
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


         
   