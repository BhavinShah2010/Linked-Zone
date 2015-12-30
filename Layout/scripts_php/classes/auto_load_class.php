<?php

function __autoload ($name)
	 {
		 	$str = "";
			$str .= "class.".$name.".php";
			include ($str);
	 }
?>