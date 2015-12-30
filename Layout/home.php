<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/symbol.png" />
<link href="styles/reset.css" type="text/css" rel="stylesheet" />
<link href="styles/style.css" type="text/css" rel="stylesheet" />
<link href="styles/home_design.css" rel="stylesheet" type="text/css" />
<!-- <link href="styles/side_bar.css" type="text/css" rel="stylesheet" /> -->
<script type="text/javascript" src="styles/script.js"></script>
<script src="styles/jquery.js"></script>
<!--<script>
	$(document).ready(function() {
		$('#selected_bts').hover(function(){
			$('#slide_bar').animate({left:'0px'},200);
		},
		function () {
					$('#slide_bar').animate({left:'-205px'},200);
			}
		);
	});
</script> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Linked Zone</title>
</head>

<body onload="take_windowSize ()">
	<div id="header">
    	<div id="logo">Linked Zone</div>  
        
        
  <!--      <div id="nav_bar" style="float:right;">
        	<div class="button"><a href="#" style="color:#bad80a;">Home</a></div>
        	<div class="button"><a href="#">Profile</a></div>
        	<div class="button"><a href="#">Manage</a></div>
        	<div class="button"><a href="#">Logout</a></div>                                    
        </div>-->
        
    </div>
        <div id="header_strip"> </div>
        <div id="side_pannel"></div>

    
        <form name="homePost"  action="scripts_php/addPost.php" method="post">
	        <textarea name="postVal" rows="20" cols="50" placeholder="ENTER YOUR POST" style="resize:none;"></textarea>        
	        <input type="submit" value="Post"  name="postBtn"/>	
        </form> 

<!--			<div id="selected_bts">
               	 <div class="bt_icon" style="background-position:-42px -21px;"></div>
                <div id="selected_bt">Home</div>

                
                <div id="slide_bar">
                	<div class="bts">
                    	<div class="bt_icon" style="background-position:-42px -21px;"></div>
                        <div class="bt_options">Home</div>
                    </div>
	                <hr />                    
                	<div class="bts">
                    	<div class="bt_icon" style="background-position:-121px -61px;"></div>
                        <div class="bt_options">Profile</div>
                    </div>
                	<div class="bts">
                    	<div class="bt_icon" style="background-position:19px 24px;"></div>
                        <div class="bt_options">Messages</div>
                    </div>
                	<div class="bts">
                    	<div class="bt_icon" style=" background-position:-43px -41px;"></div>
                        <div class="bt_options">Events</div>
                    </div>

                	<div class="bts">
                    	<div class="bt_icon" style="background-position:-21px -21px;"></div>
                        <div class="bt_options">Friends</div>
                    </div>
	                <hr />
                    
                 	<div class="bts">
                    	<div class="bt_icon" style="background-position:0px -42px;"></div>
                        <div class="bt_options">Photos</div>
                    </div>
                                        
                	<div class="bts">
                    	<div class="bt_icon" style="background-position:-0px -0px;"></div>
                        <div class="bt_options">Video</div>
                    </div>
                             
                	<div class="bts">
                    	<div class="bt_icon" style="background-position:-101px 0px;"></div>
                        <div class="bt_options">Pages</div>
                    </div>
                	<div class="bts">
                    	<div class="bt_icon" style=" background-position:-0px -21px;"></div>
                        <div class="bt_options">Communities</div>
                    </div>
                    
	                <hr />           
                    
                	<div class="bts">
                    	<div class="bt_icon" style="background-position:-16px -82px;"></div>
                        <div class="bt_options">Manage</div>
                    </div>
                    
                	<div class="bts">
                    	<div class="bt_icon" style=" background-position:-36px -82px;"></div>
                        <div class="bt_options">Logout</div>
                    </div>

                    
                </div><!--selected Bts--> 

        
        </div>    
        
</body>
</html>
