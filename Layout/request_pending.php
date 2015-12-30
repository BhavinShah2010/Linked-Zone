<?php
require_once ('scripts_php/session.php');
include ('scripts_php/classes/class.user.php');
if (isset ($_SESSION['user_id']))
 {
	$u = new User ($_SESSION['user_id'] , 'user');
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
    <script type="text/javascript">
		function set_name ()
		 {
			name = '<?php echo $u->user_details()?>';
			nm = name.split(";");
			document.getElementById('owner_name').innerHTML = nm[1];
		 }
	</script>
	<link rel="shortcut icon" href="images/symbol.png" />    
    <link rel="stylesheet" type="text/css" href="styles/request_pending.css"/>
    <link rel="stylesheet" href="styles/profile_pic.css" type="text/css">
</head>
<body onLoad="set_name()">
<div id="mainheader">

	<div class="mainaux">
		<h1>
	        <a href="login.php" style="color:#82ab00;">LinkedZone</a>
        </h1>
		<h2 style="margin-top:30px;">
          <a id="owner_name"></a>
        </h2>
    </div>
</div>
  <div id="mainContainer">
		<span>
        	<div class="title" style="color:#82ab00;">Request Pending</div>
        </span>
		<hr>
        
        <div id="formContainer">
        <div id="formContainer_det">
        	<span>Your Request Is Pending For Admin Approval.
            With In 24 Hours,Your Request Will Get Proceed.
            Kindly Try Again After 24 hours.
            </span>
        </div>
        <hr><br>
                                 
                  <div class="node" style="clear:both; float:right; margin-right:3%;">
                  <a href="scripts_php/logout.php">
                    <input type="button" name="back" value="Back To Login">
                    </a>
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
        
        

        
        

<?php
	 }
   /*} 

	 else
	 {
?>
<script type="text/javascript">
	window.location.replace ('registration.php');
</script>
<?php
	 }*/
?>
          