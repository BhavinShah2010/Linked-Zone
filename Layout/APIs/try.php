<?php
	include ('PHPExcel/IOFactory.php');
	$file = "sample.xlsx";
	echo "Loading File : "."<br>";
	$obj = PHPExcel_IOFactory::load($file);
	echo "<hr>";
	$data = $obj->getActiveSheet ()->getRowIterator ();//toArray (null , true , true , true);
	echo '<table border="1" style="border:thin solid #CCC;">';
	foreach ($data as $row)
	 {
		 $cellIterator = $row->getCellIterator ();
//		 echo $row->getRowIndex();
		 echo "<tr>";
		 foreach ($cellIterator as $cell)
		  {
//				echo $cell->getColumn ();  
				echo "<td>";
				echo $cell->getCalculatedValue ();
				echo "</td>";
		  }
		 echo "</tr>";

//		 print_r($row);
	 }
	echo "</table>";
//	print_r ($data);
//	var_dump ($data);

?>
