<?php
include_once ('auto_load_class.php');
class report extends connect
 {
	private $report_id; 
	private $report_owner_id;
//	private $report_owner_name; 
	private $report_name;
	private $report_type;
	private $report_time;
	private $about_report;
	private $for_year;
	
	public function __construct ()
	 {
		$this -> db_connect ("localhost" , "root" , "");
		$this -> db_select ("linkedzone");
		 
	 	$this->report_type = 0;
	 }	 
	public function set_owner_report ($reporter_id)
	 {
	 		 $this->report_owner_id = $reporter_id;
			 
	 } 
	public function set_report_value ($report_type , $report_name , $about_report , $report_time , $for_year , $report_id = 0)
	 {

		 $this->report_type = $report_type;
		 $this->report_name = $report_name;
		 $this->about_report = $about_report;
		 $this->report_time = $report_time;
		 $this->for_year    = $for_year;
		 $this->report_id = $report_id;
//		 echo $report_name;
		 
	 } 
	public function add_report ()
	 {
		$sql = "INSERT INTO report_tb VALUES ('' , '".$this->report_type."' , '".$this->report_name."' , '".$this->about_report."' , '".$this->report_time."' , '".$this->for_year."')" ;
		$result = mysqli_query ($this->con , $sql);
		if (!$result)
			die (mysqli_error ($this->con));
		$sql = "SELECT report_id FROM report_tb WHERE time_of_post_report = '".$this->report_time."'";
		$result = mysqli_query ($this->con , $sql);
		if (!$result)
			die (mysqli_error ($this->con));
		$row = mysqli_fetch_array ($result);
		$this->report_id = $row['report_id'];
		$sql = "INSERT INTO admin_report_tb VALUES ('".$this->report_owner_id."' , '".$this->report_id."')";
		$result = mysqli_query ($this->con , $sql);
		if (!$result)
			die (mysqli_error ($this->con));
	 }
	public function get_report ($report_id)
	 {
		$sql = "SELECT * FROM report_tb WHERE report_id = '".$report_id."'";
		$result = mysqli_query ($this->con , $sql);
		
		if (!$result)
		 {
			die (mysqli_error ($this->con));
		 }
		$row = mysqli_fetch_array ($result);
		
		$this->set_report_value ($row['report_type'] , $row['report_name'] , $row['about_report'] , $row['time_of_post_report'] , $row['for_year'] , $row['report_id']);

		$sql = "SELECT * FROM admin_report_tb WHERE report_id = '".$report_id."'";
		$result = mysqli_query ($this->con , $sql);
		
		if (!$result)
		 {
			echo (mysqli_error ($this->con));
		 }
		$row = mysqli_fetch_array ($result);
		$this->set_owner_report($row['reporter_id']);

	 }
	public function get_report_parameters ()
	 {
		 $arr = "";
		 $arr .= $this->report_id.";";
		 $arr .= $this->report_owner_id.";";
		 $arr .= $this->report_type.";";
		 $arr .= $this->report_name.";";
		 $arr .= $this->for_year.";";		 		 		 
		 $arr .= $this->report_time."/*+-";		 
		 $arr .= $this->about_report;
		 
		 return $arr;
	 }

 }
 
$report = new report();
?>