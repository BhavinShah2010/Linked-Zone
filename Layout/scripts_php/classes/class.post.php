<?php
include_once ('auto_load_class.php');
include_once ('interface.query_processor.php');

class Post implements query_processor
 {
	 private $post_id;							/*	post id */
	 private $post_owner_id;
	 private $post_owner_name;
	 private $post_date_time;
	 private $post_type;
	 private $post_content;
	 private $post_doc_path;
	 private $post_likes;
	 private $post_liked_flag;	 				/* Whether post is liked by current user or not */
	 private $no_of_comments;
	 private $report_post;
	 
	 					/*			Comment Attributes			*/
	 
	 private $comment_id = array ();
	 private $content = array ();
	 private $commentor_id = array ();
	 private $commentor_name = array ();
	 
	 public function __construct ($id) 
	  {
		  $this -> post_id = $id;
		  $this -> no_of_comments = 0;
		  $this -> report_post = 0;
		 // return $this;
	  }
	  
	 public function process_post ($con , $u_type)
	  {
		  $tables;
		  if ($u_type == 'admin')
		   {
			   $tables[0] = "admin_login_tb";
			   $tables[1] = "admin_post_det_tb";
			   $tables[2] = "admin_post_tb";
		   }
		  else
		   {
			   $tables[0] = "user_reg_tb";
			   $tables[1] = "post_tb";
			   $tables[2] = "user_post_tb";			   
		   }
			$sql = "SELECT * FROM ".$tables[1]." WHERE post_id = '".$this->post_id."'";
			$result = mysqli_query ($con, $sql) or die (mysqli_error ($con));
			$post_det = mysqli_fetch_array ($result);
	
			//$post_det = $this -> process_select_query ($con , $sql);
			$this -> post_type = $post_det['post_type'];
			//echo $this -> post_type;
			$this -> post_content =stripslashes($post_det['post_text_content']);
			$this -> post_doc_path = $post_det['post_doc_name'];
			$this -> post_date_time = $post_det['time_of_post'];
			$this -> post_likes = $post_det['post_like_counter'];
			$this -> report_status = $post_det['report_status'];
			$sql = "SELECT pattern_id , first_name , last_name FROM ".$tables[0]." WHERE pattern_id = (SELECT pattern_id FROM ".$tables[2]." WHERE post_id = '".$this->post_id."')";
			$res = mysqli_query ($con , $sql) or die (mysqli_error ($con));
			$result = mysqli_fetch_array ($res);

			
			$this -> post_owner_id = $result['pattern_id'];			
			$this -> post_owner_name = $result['first_name'].' ' . $result['last_name'];

			$this -> post_liked_flag = 0;

	  }


	 
	 public function fetch_comments ($con) 
	  {
		  $sql = "";
		  $str = "";
		  $result;
		  $sql = "SELECT * FROM user_post_comment_tb WHERE post_id = '".$this -> post_id."'";
		  $result = mysqli_query ($con , $sql);
		  //$this->no_of_comments = mysqli_num_rows($result);
		  while ($row = mysqli_fetch_array ($result))
		   {
			   $this -> process_comment ($con , $row['comment_id']);
			   $this -> process_commentor_details ($con , $row['fpattern_id']);
			   $str .= $this->comment_id [$this->no_of_comments];			   
			   $this->no_of_comments++;
		   }
		   
	  }
	 
	 public function  process_comment ($con , $comment_id)
	  {
		$sql = "";
		$result;
		
	   	$sql = "SELECT * FROM comment_tb WHERE comment_id = '".$comment_id."'";
		$result = mysqli_fetch_array (mysqli_query ($con , $sql));

		$this -> comment_id [$this -> no_of_comments] = $comment_id;		
		$this -> content    [$this -> no_of_comments] = $result['comment_content'];

	  }  
	  
	 public function process_commentor_details ($con , $user_id) 
	  {
		  $sql = "";
		  $result;
		  
		  $sql = "SELECT first_name , last_name FROM user_reg_tb WHERE pattern_id = '".$user_id."'";
		  $result = mysqli_fetch_array (mysqli_query ($con , $sql));
		  
		  $this -> commentor_id   [$this -> no_of_comments] = $user_id;
		  $this -> commentor_name [$this -> no_of_comments] = $result['first_name']." ".$result ['last_name'];
		  
	  }
	  
	  // This function will iterate through comments of calling object post.
	 public function add_new_post ($con ,$cuser , $type , $content , $img , $time , $u_type)
	  {
			$extension = "";
//			$content = addslashes ($content);
			if ($u_type == 'admin')
			 {
				 $tables[0] = "admin_post_tb";
 				 $tables[1] = "admin_post_det_tb";
				 $sql = "INSERT INTO ".$tables[1]." (post_id , post_type , post_text_content , post_doc_name , time_of_post, post_like_counter) VALUES
		 ('','".$type."'  , '".$content."' , '".$img."' , '".$time."', '0' )" or die ("prbs");			 
			 }
			else
			 {
				 $tables[0] = "user_post_tb";
				 $tables[1] = "post_tb";
				$sql = "INSERT INTO ".$tables[1]." (post_id , post_type , post_text_content , post_doc_name , time_of_post, post_like_counter , report_status) VALUES
		 ('','".$type."'  , '".$content."' , '".$img."' , '".$time."', '0' , '0')" or die ("prbs");
				 
			 }
			
			$result = mysqli_query ($con ,$sql);	
			if ($result)
			 {
				$result = mysqli_fetch_array(
							mysqli_query($con,"SELECT post_id from ".$tables[1]." where time_of_post = '".$time."'"));
				$this->post_id = $result['post_id'];
				
				$result = mysqli_query ($con,"INSERT INTO ".$tables[0]." (pattern_id , post_id) VALUES 
					('".$cuser."' ,  '".$this->post_id."')");
					
					if ($result)
					 {
						 $this->process_post($con , $u_type);
						 echo $this->get_all_val();
						 echo "/*+-";
						 echo $this->get_post_content();
					 }
					else
					 die (mysqli_error ($con));
		 }
		else
		 die (mysqli_error ($con));
			
	
		  
	  } 
	 public function get_comment_det () 
	  {
		  $arr='';
		  for ($i = 0 ; $i < $this->no_of_comments ; $i++)
		   {
			    $arr .= $this->commentor_id[$i]."/;";
			    $arr .= $this->commentor_name[$i]."/;";
				$arr .= $this->content[$i]."/;";
   			}
		return $arr;
	  }

	  
	 public function get_comment_cnt ()
	  {
		 return $this->no_of_comments;
	  } 
	  
	 public function process_select_query ($con , $sql)
	  {
			return mysqli_fetch_array (mysqli_query ($con , $sql) or die(mysqli_error ($con)));
	  
	  }
	  
	 /*			This function will determine whether the post is liked by current user or not.		*/ 	
	 
	 public function isLiked ($con,$cuser) 
	  {
		  $sql = "SELECT * FROM user_post_liked_tb WHERE fpattern_id = '".$cuser."' AND
		  		  post_id = '".$this->post_id."'";
		  $result = mysqli_query ($con , $sql);
		  if (!$result)
		  	echo (mysqli_error ($con));
		  if (mysqli_num_rows($result) > 0)
			  $this -> post_liked_flag = 1;
	  }
	  
  
	 // This function will return all basic information of post.
	 
	 public function get_all_val ()
	  {
		$arr = "";
		$arr .= $this -> post_id. ";";
		$arr .= $this -> post_owner_id.";";
		$arr .= $this -> post_owner_name.";";
		$arr .= $this -> post_type.";";
		$arr .= $this -> post_doc_path.";";
		$arr .= $this -> post_date_time.";";
		$arr .= $this -> post_likes.";";
		$arr .= $this -> post_liked_flag.";";
		$arr .= $this -> report_status.";";
		return $arr;
	  }
	  
	 // This function will return the post content. 
	  
	 public function get_post_content  ()
	  {
		  //return 'harsh';
//		  return $this->post_content;
		  if ($this->post_type == 2)
		 	 return $this -> post_content."IMAGE".$this->post_doc_path;
		  else if ($this -> post_type == 3)
		  	return $this -> post_content."DOC".$this->post_doc_path;
		  else if ($this -> post_type == 4)
		  	return $this -> post_content."XLS".$this->post_doc_path;
		  else if ($this -> post_type == 5)
		  	return $this -> post_content."PDF".$this->post_doc_path;
		  else if ($this -> post_type == 6)
		  	return $this -> post_content."TXT".$this->post_doc_path;
		  else
		  	return $this->post_content;
	  }
	  
	 // This function will delete this post (Will Call Using Ajax Function).
	 		  
	 public function delete_post ($con , $cuser , $type , $u_type )
	  {
		  if ($u_type == 'admin')
		   {
			   $tables[0] = "admin_post_det_tb";
			   $path = "../ADMIN/all_admin_img/user_".$cuser."/";			   
		   }
		  else
		   {
			   $tables[0] = "post_tb";
			   $path = "../all_user_img/user_".$cuser."/";
		   }
		  if ($type != 1)
		   {
			   $sql = "SELECT post_doc_name FROM ".$tables[0]." WHERE post_id = '".$this->post_id."'";
			   $result = mysqli_fetch_array (mysqli_query($con , $sql));
			   unlink ($path.$result['post_doc_name']);
		   }
		   if ($u_type != 'admin')
		    {
			  $sql = "DELETE * FROM comment_tb WEHERE comment_id IN (SELECT comment_id FROM user_post_comment_tb WHERE post_id = '".$this->post_id."')" ;
			  mysqli_query ($con , $sql);
			}

		  $sql = "DELETE FROM ".$tables[0]." WHERE post_id = '".$this -> post_id."'";
		  $result = mysqli_query ($con , $sql);
			 echo  mysqli_error ($con);
		 echo "Post Deleted.";
	  }

	 public function delete_reported_post ($con , $cuser , $type , $u_type )
	  {
		   $tables[0] = "post_tb";
		   $path = "../all_user_img/user_".$cuser."/";

		  if ($type != 1)
		   {
			   $sql = "SELECT post_doc_name FROM ".$tables[0]." WHERE post_id = '".$this->post_id."'";
			   $result = mysqli_fetch_array (mysqli_query($con , $sql));
			   unlink ($path.$result['post_doc_name']);
		   }
			  $sql = "DELETE * FROM comment_tb WEHERE comment_id IN (SELECT comment_id FROM user_post_comment_tb WHERE post_id = '".$this->post_id."')" ;
			  mysqli_query ($con , $sql);

		  $sql = "DELETE FROM ".$tables[0]." WHERE post_id = '".$this -> post_id."'";
		  $result = mysqli_query ($con , $sql);
		  echo  mysqli_error ($con);
		  echo "Post Deleted.";
	  }


	 public function abuse_report_post ($con , $cuser , $type , $u_type)
	  {
		  if ($u_type == 'admin')
		   {
			   $report_status = "report_status = 0";
			   $msg = "Post is Set to not abuse";
		   }
		  else
		   {
			   $report_status = "report_status = 1";
			   $msg  = "Post is Reported";
		   }
		   
		   $sql = "UPDATE post_tb SET ".$report_status." WHERE post_id = '".$this->post_id."'";
		   $result = mysqli_query ($con , $sql);
			 echo  mysqli_error ($con);
		 echo $msg;
	  }

	 public function abuse_report_discard_post ($con , $cuser , $type , $u_type)
	  {

		   
		   $sql = "UPDATE post_tb SET report_status = 0 WHERE post_id = '".$this->post_id."'";
		   $result = mysqli_query ($con , $sql);
			 echo  mysqli_error ($con);
		 echo "Request For Report of Post is Discarded.";
	  }

	  
	 // This function will add comment on this post (Will Call Using Ajax Function).
	 
	 public function add_comment ($con , $content , $cuser , $time)
	  {
		  $sql = "INSERT INTO comment_tb VALUES ('', '".$content."' , '".$time."')";
		  $result = mysqli_query ($con , $sql) or die (mysqli_error ($con)) ;
		  $sql = "SELECT comment_id FROM comment_tb WHERE time_of_comment = '".$time."'";
		  $result = mysqli_fetch_array(mysqli_query ($con , $sql));

		  //fetch added comment_id first.
		  
		  $sql = "INSERT INTO user_post_comment_tb VALUES ('".$this->post_id."' , '".$result['comment_id']."' , '".$cuser."')";
		  $result = mysqli_query ($con , $sql);
		 // echo "Comment Inserted.";
	  }
	  
	 // This function will update the number of likes on this post (Will Call Using Ajax Function).
	  
	 public function update_likes ($con, $flag , $like_cnt , $user)
	  {
		  if ($flag == 0)
		  {
		  	$sql = "INSERT INTO user_post_liked_tb VALUES ('".$user."' , '".$this -> post_id."')";
			$result = mysqli_query ($con,$sql)  or die(mysql_errno()) ;
			$like_cnt += 1;
		  }
		  else
		  {
		  	$sql = "DELETE FROM user_post_liked_tb WHERE fpattern_id = '".$user."' AND post_id = '".$this-> post_id."'";
			$result = mysqli_query ($con,$sql)  or die(mysql_errno()) ;
			$like_cnt -= 1;			
		  }
		  
		 $sql = "UPDATE post_tb SET post_like_counter = '".$like_cnt."' WHERE post_id = '".$this -> post_id."'";
		 mysqli_query ($con , $sql);
	  }
	  
 }
?>