<?php
	/*------------------- WILL ADD NEW POST -------------------------*/
require_once('session.php');
//print_r ($_SERVER['HTTP_X_FILENAME']);
$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

if ($fn) {

	// AJAX call

	file_put_contents(
		'../all_user_img/user_'.$_SESSION['user_id']."/".$fn ,
		file_get_contents('php://input')
	);
	echo $fn;
	exit();

}
else {

	// form submit
	$files = $_FILES['fileselect'];

	foreach ($files['error'] as $id => $err) {
		if ($err == UPLOAD_ERR_OK) {
			$fn = $files['name'][$id];
			move_uploaded_file(
				$files['tmp_name'][$id],
				'../all_user_img/user_'.$_SESSION['user_id']."/".$fn 
			);
			echo "<p>File $fn uploaded.</p>";
		}
	}

}
?>