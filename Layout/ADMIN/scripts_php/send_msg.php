<?php
	require_once('session.php');
	require_once('config.php');

	if(isset($_POST['msg_ids']))
	{
		
		$ids = explode("#",$_POST['msg_ids']);
		$folder="send_img";
		move_uploaded_file($_FILES["msg_img"]["tmp_name"], "../$folder/".$_FILES["msg_img"]["name"]);
		for($i=0;$i<count($ids);$i++)
		{
			
			if($ids[$i]!="")
			{
				mysqli_query($con,"update admin_msg_tb set image_path='"."$folder/".$_FILES["msg_img"]["name"]."' where msg_id='".$ids[$i]."'") or die(mysqli_error($con));		
			}			
		}
		header("Location:../index.php");		
		die();
	}
	
	$msg_content='';
	$msg_content = $_POST['msg'];
	$msg_users   = $_POST['users'];


	$users = explode("#",$msg_users);

	$ids = "";
	$date = date('Y/m/d H:i:s');
	for($i=0;$i<count($users);$i++)  
	{
		if($users[$i]!="")
		{		
			$sql = "INSERT INTO admin_msg_tb values(NULL,'".$users[$i]."' , '".$msg_content."' ,'', '".$date."')";
			mysqli_query($con,$sql)  or die (mysqli_error ($con));
			
			$tq = mysqli_query($con,"select * from admin_msg_tb where receiver='".$users[$i]."' order by msg_id desc ") or die(mysqli_error($con));			
			$res = mysqli_fetch_array($tq);
			$ids = $ids."#".$res['msg_id'];
		}
	}	
	die($ids);
?>