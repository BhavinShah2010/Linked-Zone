<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>




<?php
$con=mysqli_connect("localhost","root","");
// Check connection
mysqli_select_db($con ,"linkedzone");
// logic
// print_r($_REQUEST);
$email= $_REQUEST["user_id"]; 
$fe= $_REQUEST["first_name"]; 
$pas= $_REQUEST["password"];
$le= $_REQUEST["last_name"]; 
// $cp= $_REQUEST["cPass"]; 

$gen= $_REQUEST["gender"]; 
$rn= $_REQUEST["enrollment_no"]; 
$bd= $_REQUEST["dob"]; 


$sql= "INSERT INTO user_reg_tb values(' ','$email','$pas','$fe','$le','$rn','$gen','$bd')";

// mysql_query($sql,$con);

// $res=mysql_query("select * from data" ,$con );


$result = mysqli_query($con,$sql);


//echo mysql_num_rows($res);
 // mysql_close($con);

// header("Location: 1/filldetail.php");

/*

if ($result)
 {
?>
	<script type="text/javascript">
		window.location.replace ('../try.php');
	</script>
<?php
 }
 else
  {
	  mysql_error (die ());
	  }
mysqli_close($con);


*/


if ($result)
 {
?>
	<script type="text/javascript">
		window.location.replace ('../personalinformation.php');
	</script>
<?php
 }
 else
  {
	  mysql_error (die ());
	  }
mysqli_close($con);



?> 


 









</body>
</html>