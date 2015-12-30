<?php 
	session_start();
	require_once('\scripts_php\config.php');
	
	if(!isset ($_SESSION['user_id']))
	{
		$day = date('w');
 		$img = $day + 1 ; 
		$contents = $day + 1 ;
		
		//$Info = Background(/*1st color for Boats and Houses Background*/) , (2nd Is Huge Lush Ground and Desert) , (3rd Is Birds Sitting On The Branches ) , (4th Is Dark Orange color pic ) , (5th Is Tents On Ice Mountain) , (6th Is a Lush Mountain with House) , (7th Is a Wall Where Locks Are Hanged );
		
		$colors = array("#FFF"/*White*/, "#28937D"/*Dark Green*/, "#FFF"/* White*/, "#FFF"/*White*/, "#FF8B53"/*Orange*/, "#FFF"/*White*/, "#000"/*Black*/);
		
		$text_shadow = array("3px 2px #000"/* Black*/, "2px 1px #FFF"/*White*/, "3px 2px #000"/*Black*/, "3px 2px #000"/*Black*/, "2px 1px #000"/*black*/, "3px 2px #000"/*Black*/, "1px 2px #FFF"/*White*/);
		
?>
    
 <html> 
 <head> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <title> Welcome To Linked Zone</title>
  <style>
   body 
   {
	    background-repeat:no-repeat;
		background-attachment:fixed;
		padding:0;
        margin:0 auto;
		//color:#E8EAC8;
		//background-size:100% 100%;
		background-size:cover;
	} 
	span
	{
		color:<?php echo $colors[$day] ?>;
		text-shadow:<?php echo $text_shadow[$day] ?>;
	}
    </style>
    </head>
	<link rel="shortcut icon" href="images/symbol.png" />	
    <link rel="stylesheet" type="text/css" href="styles/reset.css" />
    <link rel="stylesheet" type="text/css" href="styles/IntroMain.css" />
      <body style="background-image:url(images/Bing/<?php echo $img ?>.jpg);">
       
       <div id="header">Linked Zone</div>
       <div id="header_strip" style="opacity:0.8;"></div>

        <div id="mainContainer">
<?php 
	$query = "SELECT content FROM quote_tb where id ='$contents'";
 	$result = mysqli_query($con , $query) or die (" Query Has Not Performed "); 
 	while ($row = mysqli_fetch_array($result))
  	{ 
		echo '<div id="textContainer">';
		echo '<span>';
		$my_content = $row['content'];
		echo "$my_content";
		echo "</div>";
    } 
?>
        
           </div><!--Main Container Ends--> 
           <div id="btn_container">
           <a href="Login.php"> <div id="btn">  Start Linking 
         </div></a>
         </div>
           <div id="Intro_Footer">
               <div id="header_strip"  style="box-shadow:0px -1px 2px black;"></div>
               <div id="footer">&copy; Copyright @Linked Zone</div>
           </div> <!-- Intro_Footer Ends-->
         
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
