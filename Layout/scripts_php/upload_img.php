<?php
require_once ('session.php');
require_once ('config.php');
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 1048576)	//max 1 MB 
		&& in_array($extension, $allowedExts))
  {
	  if ($_FILES["file"]["error"] > 0)
	    {
	    echo "Error: " . $_FILES["file"]["error"] . "<br>";
	    }
	  else
	    {
		    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			echo "Type: " . $_FILES["file"]["type"] . "<br>";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			echo "Stored in: " . $_FILES["file"]["tmp_name"];
	    }
  if (file_exists("../all_user_img/user_".$_SESSION['user_reg_id']. "/". $_FILES["file"]["name"]))
      {
  //   	 echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
		  $extension_file = $path_parts['extension'];
		  $name = 'Profile_pic.'.$extension;
		   
		  move_uploaded_file($_FILES["file"]["tmp_name"],"../all_user_img/user_".$_SESSION['user_reg_id']."/". $name);
	      $_SESSION['user_pr_info_set'] = $_SESSION['user_reg_id'];		  
		  $_SESSION['user_id'] = $_SESSION['user_reg_id'];
		  
		?>
           	<script type="text/javascript">
					id	 = '<?php echo $_SESSION['user_id']; ?>';

					window.location.replace ('reg_auth.php?u_name='+id);
			</script>
<?php
//		  echo "Stored in: " . "upload/" . $name;
      }		
  }
 else
  {
	  echo "Please Enter Valid File";
  }
?>