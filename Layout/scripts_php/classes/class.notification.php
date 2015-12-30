<?php
include_once ('auto_load_class.php');

class notification 
 {
	 private $noti_for;
	 private $no_of_notifications;
	 public function __construct ($cuser , $u_type)
	  {

		  $this->noti_for = $cuser;
		  $this->no_of_notifications = 0;
	  }
	 public function has_notification ($con)
	  {
			$sql = "SELECT * FROM user_notification_tb WHERE pattern_id = '".$this->noti_for."'";
			$result = mysqli_query ($con , $sql);
			if (!$result)
			 {
				 die (mysqli_error ($con));
				 return false;
			 }
			if (mysqli_num_rows ($result) > 0)
				return true;
			else
				return false;
	  }
	  
	  public function count_notification ($con)
	   {
		   // Count Number of notification for current user.
			$sql = "SELECT  count(DISTINCT post_id)  , type_of_notification FROM user_notification_tb WHERE pattern_id = '1' GROUP BY type_of_notification";		   

			$result = mysqli_query ($con , $sql);
			if (!$result)
				die (mysqli_error ($con));


			$this->no_of_notifications = 0;
			while ($row = mysqli_fetch_array ($result))
			 {
				//echo $row['count(DISTINCT post_id)']."<br>"; 
				$this->no_of_notifications +=  $row['count(DISTINCT post_id)'];
			 }
			return $this->no_of_notifications;
			
		   
	   } 
 }
?>