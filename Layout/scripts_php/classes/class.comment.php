<?php
include_once ('auto_load_class.php');

class Comment 
 {
	 private $comment_id;
 	 private $comment_content;

	 
	 public function __construct ($id)
	  {
		  $this -> comment_id = $id;
	  }

	  
	 public function get_com_detail ()
	  {
		return $this -> comment_id;  
	  }
	 public function get_comment_content ()
	  {
		return $this -> comment_content;  
	  } 
 }
?>