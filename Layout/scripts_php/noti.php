<?php

include ("config.php");
$sql = "SELECT count(DISTINCT post_id) FROM user_notification_tb WHERE pattern_id = '1' GROUP BY type_of_notification";
$result = mysqli_query ($con , $sql);
if (!$result)
	die (mysqli_error ($con));

//print_r (mysqli_fetch_array ($result));
$sum = 0;
while ($row = mysqli_fetch_array ($result))
 {
	//echo $row['count(DISTINCT post_id)']."<br>"; 
	$sum +=  $row['count(DISTINCT post_id)'];
 }
echo $sum;

/*
For Counting Number Of Notification For user

$sql = "SELECT  count(DISTINCT post_id)  , type_of_notification FROM user_notification_tb WHERE pattern_id = '1' GROUP BY type_of_notification";

*/
?>