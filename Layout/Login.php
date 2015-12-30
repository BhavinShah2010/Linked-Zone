<?php
require_once ('scripts_php/session.php');

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
<head>
<script src="scripts/jquery.js"></script>
<script src="scripts/script.js"></script>
<script src="scripts/validate_login.js"></script>

<script type="text/javascript">
	function fcs ()
	 {
		 document.frm.u_name.focus ();	
	 }
	
$(document).ready(function(e) {
//	alert ('h');
}); 
</script>
<title>Linked Zone</title>	
<link rel="shortcut icon" href="images/symbol.png" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/reset.css" />
<link rel="stylesheet" type="text/css" href="styles/login.css" />

</head>

<body onLoad="fcs()">
<div id="header" style="background:rgba(0,0,0,0.7);">
	<div id="logo" style="margin-top:27px; opacity:1,5;">Linked Zone</div>
    <a href="registration.php"><span>Register Now</span></a>
</div>
<div id="header_strip"  style="opacity:0.8;"></div>

<div id="login_outer">

  
   <table>
   <form name="frm" method="post">
    <tr>
    <th ><div id="logo" style="color:#bad80a; margin-left:-6px;">Log In</div></th>
    </tr>
    <tr>
    	<td>Username</td>
        <td><input type="text"  id="username" name="u_name" size="27" /></td>
    </tr>

    <tr>
    	<td>Password</td>
        <td><input type="password" id="userpass" name="u_pass" size="27"/></td>
    </tr>

    <tr>
        <td><input type="button"  name="b_login" id="btn" onClick="validate_all()" value="LOGIN" style="margin-left:0px;"/></td>
        <td> <a href="#" style="margin-left:10px;"> </a> <br />
        	<span id="error"></span>

        	  
    </tr>
    
    </form>
   </table>

  </div>

  <div id="login_footer">
<div id="header_strip"  style="box-shadow:0px -1px 2px black;"></div>
  	<div id="nav_bar" style="float:left; margin-left:40%;">
       <!-- <div class="button1"><a href="#">About</a></div>
        <div class="button1"><a href="#">Help</a></div>
        <div class="button1"><a href="#">Blog</a></div>    
        <div class="button1"><a href="#">Status</a></div>    
        <div class="button1"><a href="#">Terms</a></div>            
        <div class="button1"><a href="#">Privacy</a></div>                    
        <div class="button1"><a href="#">Advertisment</a></div>  -->          
        <div class="button1"><a href="#" style="color:#95ab08;">&copy;LinkedZone2013</a></div>                
    </div>
    
    <div id="nav_bar" style="float:right;">
    	<div class="button1"> Join Us on </div>
    	<div class="button1"><a href="http://www.facebook.com" onMouseOver="chg_img('fb' , 'url(images/facebook1.png)')" onMouseOut="chg_img('fb' , 'url(images/facebook.png)')"> <div class="icon" id="fb" style="background:url(images/facebook.png); float:right;"></div></a></div>
        <div class="button1"><a href="http://www.twitter.com"  onmouseover="chg_img('tw' , 'url(images/twitter1.png)')" onMouseOut="chg_img('tw' , 'url(images/twitter.png)')"> <div class="icon" id="tw" style="background:url(images/twitter.png);"></div></a></div>
        <div class="button1"><a href="http://www.gmail.com"  onmouseover="chg_img('gp' , 'url(images/googleplus1.png)')" onMouseOut="chg_img('gp' , 'url(images/googleplus.png)')"> <div class="icon" id="gp" style="background:url(images/googleplus.png);"></div></a></div>        
	</div>
  </div>
  </body>
  <?php  } ?>
</html>
