<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
$con=mysqli_connect("localhost","root","");
// connection
// mysql_select_db("details1",$con);
mysqli_select_db($con ,"linkedzone" );


//$fn= $_REQUEST["first_name"]; 
//$ln= $_REQUEST["last_name"]; 
//$gn= $_REQUEST["gender"]; 
//$bd= $_REQUEST["bDate"]; 
$na= $_REQUEST["nationality"]; 
$sk= $_REQUEST["skill"]; 

$hobbi= $_REQUEST["hobbie"]; 
$int= $_REQUEST["interest"]; 
$rel= $_REQUEST["rel_status"]; 
// $patern= $_REQUEST["paternid"]; 


$sql= "INSERT INTO user_personal_tb values(' ','$na','$sk','$hobbi','$int','$rel')";

// mysql_query($sql,$con);

//$result=mysql_query("select * from data1 " ,$con );
$result = mysqli_query($con,$sql);
//echo mysql_num_rows($res);
// mysql_close($con);
if ($result)
 {
?>
	<script type="text/javascript">
		window.location.replace ('../educationinformation.php');
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