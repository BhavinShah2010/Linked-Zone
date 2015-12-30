<?php
require_once ('session.php');
require_once ('config.php');

$val[0] = addslashes ($_REQUEST ['sec_que']);
$val[1] = addslashes ($_REQUEST ['seq_que_ans']);
$val[2] = addslashes ($_REQUEST ['phone_no']);
	
$str = "'".$_SESSION['user_reg_id']."' , '";	// for patternid we have set it to autoincrement so first value sholud be blank
$str .= implode ("', '" , $val). "'";


	echo $str;
			$sql = "INSERT INTO user_security_tb VALUES ($str)";
			$result = mysqli_query ($con,$sql);
			$_SESSION['user_s_info_set'] = $_SESSION['user_reg_id'];
			if (!$result)
				die ("ERROR OCCURED DURING REGISTRATION TRY AGAIN LATTER");
				
	
?>
		<script type="text/javascript">
                window.location.replace ('../imageupload1.php');
        </script>
<?php
mysqli_close($con);
?> 
