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
	$id = $_GET['id'];
	$topic = $_GET['topic'];
	$fration = $_GET['fration'];
	$table = $_GET['table'];
	$tableName = "5_".$fration.$topic.$table; 
	$dataQuery = mysql_query("SELECT * FROM `$tableName` WHERE `id` = '$id'") or die(mysql_error());
	$dataRow = mysql_fetch_assoc($dataQuery) or die(mysql_error());
	$json = json_encode($dataRow);

	echo $json
?>
