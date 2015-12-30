<?php
	require_once ('session.php');
	require_once ('config.php');
	if (isset ($_SESSION['user_id']))
		 {

			 	 $cuser = $_SESSION['user_id'];
				 $sql = "UPDATE user_reg_tb SET login_status = 0 WHERE pattern_id = '$cuser'";
				 if (mysqli_query ($con,$sql))
				 	{
					 	session_destroy ();
?>
						<script type="text/javascript">
                        window.location.replace('../login.php');
                        </script>
<?php				
					}
		 }
?>