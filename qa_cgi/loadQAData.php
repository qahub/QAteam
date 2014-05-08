<?php

	/*  input data:
 	 *   
 	 * topic 主題名稱
	 * count 讀取順序編號
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
