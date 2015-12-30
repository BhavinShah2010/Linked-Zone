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


$sc= $_REQUEST["sec_que"]; 
$an= $_REQUEST["ans"]; 
$pa= $_REQUEST["phono_no"]; 

// $spe= $_REQUEST["specialization"]; 


$sql= "INSERT INTO user_security_tb values(' ','$sc','$an','$pa')";

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
		window.location.replace ('../imageupload1.php');
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