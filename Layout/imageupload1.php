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
		 if (isset ($_SESSION['user_pr_info_set']))
		  {?>

          	<script type="text/javascript">
				window.location.replace ('index.php');
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
	<link rel="shortcut icon" href="images/symbol.png" />    
    <link rel="stylesheet" type="text/css" href="styles/personal.css"/>
    <link rel="stylesheet" href="styles/profile_pic.css" type="text/css">
</head>
<body>
<div id="mainheader">

	<div class="mainaux">
		<h1>
	        <a href="login.php">LinkedZone</a>
        </h1>
		<h2 style="margin-top:30px;">
            <a>Harsh Soni</a>
        </h2>
    </div>
</div>
  <div id="mainContainer">
		<span>
        	<div class="title">Profile Picture</div>
        </span>
		<hr>
        
        <div id="formContainer">
               <form  name="frm" action="scripts_php/upload_img.php" method="post"  enctype="multipart/form-data">
                    <div class="node">
					<label for="file">Profile Picture (MAX_SIZE = 1MB)</label>
					<hr>
                    <div id="profile_pic_cnt">
                        <img src="../Layout/images/profile_pic.jpg" id="pr_pic">
                        <div class="hover_box">
                        <input type="file" id="xhr_field" name="file" onChange="readURL (this)">
                        <input type="hidden" value="xhr">
                        </div>
                    </div>
					</div>
                  <div class="err_node">
                   	<label id="error">Please Enter Proper Email Id</label>                  
				  </div>                   
                  <div class="node" style="clear:both; float:right; margin-right:3%;">
                    <input type="submit" name="submit" value="Next">
                  </div>

             </form>


        </div>	<!-- formContainer -->
    </div>	 <!-- mainContainer -->
        
           
 
</body>       
</html>


    
               
               
            
<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
                $('#pr_pic').attr('src', e.target.result);
				$('#msg').html ('');				
        }
		reader.onprogress = function (e){
				$('#msg').html ('Uploading');
			}

        reader.readAsDataURL(input.files[0]);
    }
}   
               
               
               
                    
                    
                    
     </script>               
        
        

        
        

<?php } 

	 else
	 {
?>
<script type="text/javascript">
	window.location.replace ('registration.php');
</script>
<?php
	 }
?>
        <!--  <div id="btn"> <Span> <a href="Login.php">Start Linking</a> </Span>
         </div> -->
           </div><!--Main Container Ends--> 
          <!-- <div id="Intro_Footer">
               <div id="header_strip"  style="box-shadow:0px -1px 2px black;"></div>
               <div id="footer">&copy; Copyright @Linked Zone</div>
           </div> 
           -->
        </body> 
    </html>