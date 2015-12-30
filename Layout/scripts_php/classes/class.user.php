<?php
include ('auto_load_class.php');
include ('class.connect.php');
include ('class.notification.php');
include ('class.Post.php');


class User extends connect implements query_processor
 {
	 public $p = array ();
	 public  $notify;
	 private $cuser;
	 private $cusername;
	 private $user_type;
	 public $no_of_post;
	 private $clg_year;

	 	
	 public function __construct ($user , $u_type)
	  {
		$this -> db_connect ("localhost" , "root" , "");
		$this -> db_select ("linkedzone");
		
		$this -> cuser = $user;
		$this->user_type = $u_type;
		
		if ($this->user_type == 'user')
		{
			$tb_name = "user_reg_tb";
			$sql = "SELECT first_name , last_name , enrollment_no FROM ".$tb_name." WHERE pattern_id = '".$this->cuser."'";
		}
		else
		 {
			$tb_name = "admin_login_tb";
			$sql = "SELECT first_name , last_name  FROM ".$tb_name." WHERE pattern_id = '".$this->cuser."'";
		 }

		$result = mysqli_fetch_array (mysqli_query ($this->con , $sql));
		$this->cusername = $result['first_name']." ".$result['last_name'];
		
		$this->notify = new notification (1 , $this->user_type);//$this->cuser);
		if ($this->user_type == 'user')// set college year of student type user
			$this->clg_year = substr ($result['enrollment_no'] , 0 , 1);
	  }
	 public function isApproved ()
		  {
			  $sql = "SELECT approve_status FROM user_reg_tb WHERE pattern_id ='".$this->cuser."'";
			  $result = mysqli_query ($this->con , $sql);
			  if (!$result)
				mysqli_error ($con);
			 $row = mysqli_fetch_array ($result);
			 if ($row['approve_status'] == '1')
				return true;
			else
				return false;
		
		  }	 
	 public function get_clg_year ()
	  {
		  return $this->clg_year;
	  }
	 public function get_num_reports ()
	  {
			$sql = "SELECT * FROM report_tb"  ;
			$result = mysqli_query ($this->con , $sql);
			return $result;
	  }
	 
	 public function get_student_reports ()
	  {
			$sql = "SELECT * FROM report_tb WHERE for_year = '".$this->clg_year."'";
			$result = mysqli_query ($this->con,$sql);
			return $result;
	  }
	 
	 public function user_details ()
	  {
			return $this->cuser.";".$this->cusername;
	  } 
	 public function noti_details ()
	  {
			return $this->notify->count_notification ($this->con).";";  
	  } 
	 public function fetch_all_post ()
	  {
		  $tables;
		  
		 if ($this->user_type == 'admin') 
		  {
			  $sql = "SELECT post_id FROM admin_post_tb WHERE pattern_id = '".$this->cuser."'";
		  }
		 else
		  {
			$sql = "SELECT post_id FROM user_post_tb WHERE  pattern_id IN
		    		(SELECT fpattern_id FROM user_friends_tb WHERE pattern_id = '".$this -> cuser."')
							 OR pattern_id = '".$this -> cuser."' order by post_id ASC"; 
		  }
		$result = $this -> process_select_query ($this -> con , $sql);
		$this -> no_of_post =  mysqli_num_rows($result);
		$i = 0;
		while ($row = mysqli_fetch_array ($result))
		 {
			 $this -> p[$i] = new Post ($row['post_id']);			 
			 $this -> p[$i] -> process_post ($this -> con , $this->user_type);
			 if ($this->user_type != 'admin')
			  {
				 $this -> p[$i] -> isliked ($this -> con , $this -> cuser);
				 $this -> p[$i] -> fetch_comments ($this -> con);
			  }
			 $i++;
		 }
		//return "harsh";
		
	 }
	 public function fetch_all_reported_post ()
	  {
		  $tables;
		  
		$sql = "SELECT post_id FROM post_tb WHERE  report_status = 1";
//		mysqli_query ($this->con , $sql) or die (mysqli_error ($this->con));
		$result = $this -> process_select_query ($this -> con , $sql);
		$this -> no_of_post =  mysqli_num_rows($result);
		$i = 0;
		while ($row = mysqli_fetch_array ($result))
		 {
			 $this -> p[$i] = new Post ($row['post_id']);			 
			 $this -> p[$i] -> process_post ($this -> con , $this->user_type);
			 $this -> p[$i] -> isliked ($this -> con , $this -> cuser);
			 $this -> p[$i] -> fetch_comments ($this -> con);
			 $i++;
		 }
	  }
	 
	 
	 public function initiate_notification ()
	  {
		  if ($this->notify->has_notification ($this->con))
		   {
			   return $this->notify->count_notification($this->con);
		   }
	  }
	  
	 public function process_select_query ($con , $sql)
	  {
			return  (mysqli_query ($con , $sql));		  
	  }
	 public function user_add_post ($type , $content , $img , $time)
	  {	
	  		echo $content;
			$temp = new Post (-1);
			$temp->add_new_post ($this->con , $this->cuser , $type , $content , $img , $time , $this->user_type);
			unset ($temp);
//			echo "user";
	  }
	 public function user_del_post ($post_id , $type)
	  {
		  $temp = new Post ($post_id );
		  $temp -> delete_post ($this -> con , $this->cuser,$type , $this->user_type);
		  unset ($temp);
	  }

	 public function user_del_report_post ($post_id , $type)
	  {
		  $temp = new Post ($post_id );
		  $temp -> delete_reported_post ($this -> con , $this->cuser,$type , $this->user_type);
		  unset ($temp);
	  }


	 public function user_report_post ($post_id , $type)
	  {
		  $temp = new Post ($post_id );
		  $temp -> abuse_report_post ($this -> con , $this->cuser,$type , $this->user_type);
		  unset ($temp);
	  }

	 public function user_discard_report_post ($post_id , $type)
	  {
		  $temp = new Post ($post_id );
		  $temp -> abuse_report_discard_post ($this -> con , $this->cuser,$type , $this->user_type);
		  unset ($temp);
	  }	  

	  
	 public function user_add_comment ($post_id , $content)
	  {
		  $temp = new Post ($post_id);
		  $time = date('Y/m/d H:i:s');
		  $temp -> add_comment ($this -> con , $content , $this -> cuser , $time);
		  unset ($temp);	
	  }
	 public function user_update_like ($post_id , $flag , $like_cnt) 
	  {
		$temp = new Post ($post_id);
		$temp -> update_likes ($this -> con , $flag , $like_cnt , $this -> cuser);
		unset ($temp);
	  }
	  
	 public function user_fetch_comment ($post_id) 
	  {
		$temp = new Post ($post_id);
		$temp -> fetch_comments ($this -> con);
		//echo $temp->get_comment_cnt ();		
//		echo $temp->get_comment_details (0);
//		echo $no;
//		unset ($temp);  
	  }
	 public function user_notification ()
	  {
	  } 
 }
 
//$u = new User (); 
//$u ->initiate_notification();

?>