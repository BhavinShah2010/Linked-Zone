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
// mysql_select_db("details2",$con);
mysqli_select_db($con , "linkedzone" );


$scn= $_REQUEST["school_name"]; 
$cln= $_REQUEST["clg_name"]; 
$st= $_REQUEST["stream"]; 
$cly= $_REQUEST["clg_year"]; 
// $spe= $_REQUEST["specialization"]; 


$sql= "INSERT INTO user_education_tb values(' ','$scn','$cln','$st','$cly')";

//mysql_query($sql,$con);

//$res=mysql_query("select * from  " ,$con );

$result = mysqli_query($con,$sql);

//echo mysql_num_rows($res);
// mysql_close($con);
// header("Location: welcome.php");


if ($result)
 {
?>
	<script type="text/javascript">
		window.location.replace ('../swqurityinformaion.php');
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