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
	$dataQuery = mysql_query("SELECT * FROM `$tableName` WHERE `id` > '$count' AND `fration` = '$fration'") or die(mysql_error());
	$dataRow = mysql_fetch_assoc($dataQuery) or die(mysql_error());
	$json = json_encode($dataRow);

	echo $json
?>
