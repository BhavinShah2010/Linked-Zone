<?php
require_once ('session.php');
require_once ('config.php');

$val[0] = addslashes ($_REQUEST ['nationality']);
$val[1] = addslashes ($_REQUEST ['skill']);
$val[2] = addslashes ($_REQUEST ['hobbies'])	;
$val[3] = addslashes ($_REQUEST ['interest']);
$val[4] = addslashes ($_REQUEST ['rel_status']);
$str = "'".$_SESSION['user_reg_id']."' , '";	// for patternid we have set it to autoincrement so first value sholud be blank
$str .= implode ("', '" , $val). "'";


			$sql = "INSERT INTO user_personal_tb VALUES ($str)";
			$result = mysqli_query ($con,$sql);
			$_SESSION['user_p_info_set'] = $_SESSION['user_reg_id'];
			if (!$result)
				die ("ERROR OCCURED DURING REGISTRATION TRY AGAIN LATTER");
				
	
?>
		<script type="text/javascript">
                window.location.replace ('../educationinformation.php');
        </script>
<?php
mysqli_close($con);
?> 
