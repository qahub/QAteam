<?php


	include("connect.php");
	$id = $_GET['id'];
	$topic = $_GET['topic'];
	$tableName = "5_qaData".$topic; 
	$dataQuery = mysql_query("SELECT `title`, `content` FROM `$tableName` WHERE `id` = '$id'") or die(mysql_error());
	$dataRow = mysql_fetch_assoc($dataQuery) or die(mysql_error());
	$jsonData['title'] = $dataRow['title'];
	$jsonData['content'] = $dataRow['content'];
	$jsonData['contentQ'] = $dataRow['contentQ'];
	$json = json_encode($jsonData);

	echo $json
?>
