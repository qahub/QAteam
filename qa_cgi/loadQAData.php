<?php

	/*  input data:
 	 *   
 	 * topic �D�D�W��
	 * count Ū�����ǽs��
	 *
	 *  output data:
	 *  title & content
	 *
	 * */

	include("connect.php");

	$topic = $_GET['topic'];
	$count = $_GET['count'];
	$fration = $_GET['fration'];
	$tableName = "5_qaData".$topic; 
	$counter  = 0;
	$dataQuery = mysql_query("SELECT `title`, `content` FROM `5_qaData$topic` WHERE `id` > '$count' AND `fration` = '$fration'");
	$dataRow = mysql_fetch_assoc($dataQuery));
	$jsonData['title'] = $dataRow['title'];
	$jsonData['content'] = $dataRow['content'];
	$json = json_encode($jsonData);

	echo $json;
?>
