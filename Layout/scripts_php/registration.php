<?php
require_once ('session.php');
require_once ('config.php');

$val[0] = addslashes ($_REQUEST ['user_id']);
$val[1] = addslashes ($_REQUEST ['password']);
$val[2] = addslashes ($_REQUEST ['first_name'])	;
$val[3] = addslashes ($_REQUEST ['last_name']);
$val[4] = addslashes ($_REQUEST ['enrollment_no']);
$val[5] = addslashes ($_REQUEST ['gender']);
$val[6] = date("Y-m-d",strtotime($_REQUEST ['dob']));
$val[7] = 1;
$val[8] = 1;
$val[9] = 0;		  // 0 means not deleted
$val[10] = 0;		 //  0 means no blocking
$val[11] = 2;		//   2 for friends 1 means only me 3 means friends of friends
$val[12] = 0;	   //	 1 for approved and 0 for not approved

$str = "'' , '";	// for patternid we have set it to autoincrement so first value sholud be blank
$str .= implode ("', '" , $val). "'";
$sql = "SELECT user_id FROM user_reg_tb WHERE user_id = '".$val[0]."'";
$row =	mysqli_query ($con,$sql);
if (mysqli_num_rows ($row) > 0)
 {
	echo 0;
	return;
 }

/*while ($result = mysqli_fetch_array ($row))
 {
	 	if ($result['user_id'] == $val[0])
		 {
			echo "0";
			return;
		 }
 }*/


			$sql = "INSERT INTO user_reg_tb VALUES ($str)";
			$result = mysqli_query ($con,$sql);
			if (!$result)
				die ("ERROR OCCURED DURING REGISTRATION TRY AGAIN LATTER");
				
			echo 1;
			$sql = "SELECT pattern_id FROM user_reg_tb WHERE user_id = '".$val[0]."'";
			$result = mysqli_query ($con,$sql);
			$result = mysqli_fetch_array ($result);
			$_SESSION['user_reg_id'] =  $result['pattern_id'];
			
		/*------------------------------------CREATING NEW USER DIRECTORY---------------------------------*/			
			mkdir ("../all_user_img/user_".$_SESSION['user_reg_id']);
		
?>
<?php
mysqli_close($con);
?> 
