<?php

	include('connect.php');

	$uid = $_POST['uid'];
	$username = $_POST['username']
	$comment = $_POST['comment'];
	$fration = $_POST['fration'];
	$topic = $_POST['topic'];
	$table = $_POST['table'];
	$date = date('Ymd');

	if(!(empty($comment))){

		if($fration == 0){

		$query = "INSERT INTO `5_Black".$topic.$table."`(uid, comment, fration, date, username) VALUES('$uid', '$comment', '$fration', '$date', '$username')") or die(mysql_error());

		}else{

		$query = "INSERT INTO `5_White".$topic.$table."`(uid, comment, fration, date, username) VALUES('$uid', '$comment', '$fration', '$date', '$username')") or die(mysql_error());

		}

		$result = mysql_error($query) or die(mysql_error());

	} else {

		echo "No Comment";

	}
	

?>
