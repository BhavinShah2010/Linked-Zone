<?php
include_once ('interface.query_processor.php');
//require_once ('auto_load_class.php');
class connect extends Exception 
 {
	 public
	 	$con , $db;		
	 public 
	 	
		
	  	function db_connect  ($server , $user , $password)
		 {
				$this -> con =	mysqli_connect ($server , $user , $password) ;
		 }
		 
		function db_select ($database)
		 {
				 $this -> db = $database;
				 mysqli_select_db ($this -> con , $this -> db) or die ("Problem In Selection of Database");
		 }
		 
		/*function process_select_query($sql , $con) 
		 {
			 	
			 	$result = "";
				try 
				 {
 		  			$result = mysqli_query ($this -> con , $sql); 
					if (!$result)
						throw new Exception ("Problem While Fetching Data");

					switch ($type)
					 {
						case "SELECT"  : 
							break;
						case "INSERT" :
							return true;
							break;
						case "UPDATE" :
							echo "UPDATION QUERY";
							break;

	  			     }
				 }
				catch (Exception $e)
				 {
					echo $e -> getMessage ();
					return false;	 
				 }
				
		 }*/
		
 }
 
 //$my_obj = new connect();
// $my_obj -> db_connect ("localhost" , "root" , "");
// $my_obj -> db_select  ("linkedzone");
// $my_obj -> query_process("SELECT * FROM user_reg_tb" , "INSERT");
 
 
/*abstract class notification extends connect 
  {
	
	  public 
	  
	  	 abstract function  process_notification ();
  }
  
 class like_notification extends notification implements  query_processing
  {
		function process_notification ()
		 {
			 echo "harsh";
		 }	
		function process_query ($sql)
		 {
			 echo $sql;
			 }
  }
  
/* $l = new like_notification ();
 $l -> process_notification ();*/

?>