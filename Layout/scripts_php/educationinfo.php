<?php
require_once ('session.php');
require_once ('config.php');

$val[0] = addslashes ($_REQUEST ['school_name']);
$val[1] = addslashes ($_REQUEST ['college_name']);
$val[2] = addslashes ($_REQUEST ['stream'])	;
$val[3] = addslashes ($_REQUEST ['clg_year']);

$str = "'".$_SESSION['user_reg_id']."' , '";	// for patternid we have set it to autoincrement so first value sholud be blank
$str .= implode ("', '" , $val). "'";

echo $str;
			$sql = "INSERT INTO user_educational_tb VALUES ($str)";
			$result = mysqli_query ($con,$sql);
			$_SESSION['user_e_info_set'] = $_SESSION['user_reg_id'];
			if (!$result)
				mysqli_error ($con);
//				die ("ERROR OCCURED DURING REGISTRATION TRY AGAIN LATTER");
				
	
?>
		<script type="text/javascript">
                window.location.replace ('../securityinformation.php');
        </script>
<?php
mysqli_close($con);
?> 
