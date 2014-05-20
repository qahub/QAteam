<?php

	include('connect.php');

	$nowNum = $_POST['nowNum'];
	$count = $_POST['count'];
	$topic = $_POST['topic'];
	$fration = $_POST('fration');
	$table = $_POST['table'];
	$i = 0;

	if( $fration == 2 ) {
		$query = "SELECT * FROM `5_Black".$topic.$table."` WHERE id > $nowNum";
	} else {
		$query = "SELECT * FROM `5_White".$topic.$table."` WHERE id > $nowNum";
	}
	
	$returnData = new array();

	for($i=0;i<$count;$i++){

		$row = mysql_fetch_assoc($query);
		array_push($returnData, $row);

	}

	echo json_encode($returnData);

?>
