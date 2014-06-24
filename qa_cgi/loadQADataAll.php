<?php


	include("connect.php");
	$id = $_GET['id'];
	$topic = $_GET['topic'];
	$tableName = "5_qaData".$topic; 
	$dataQuery = mysql_query("SELECT * FROM `$tableName` WHERE `id` = '$id'") or die(mysql_error());
	$dataRow = mysql_fetch_assoc($dataQuery) or die(mysql_error());
	$jsonData['content'] = $dataRow['content'];
	$jsonData['contentQ'] = $dataRow['contentQ'];
	$jsonData['fration'] = $dataRow['fration'];
	$json = json_encode($jsonData);

	echo $json
?>
