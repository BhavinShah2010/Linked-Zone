<?php
	try {
	 $bdd = new PDO('mysql:host=localhost;dbname=linkedzone', 'root', '');
	 } 
	 catch(Exception $e) {
		exit('Unable to connect to database.');
	 }
	$id = $_REQUEST["id"];
	$sql = "DELETE from evenement WHERE id= ?";
	$q = $bdd->prepare($sql);
	$q->execute(array($id));
?>