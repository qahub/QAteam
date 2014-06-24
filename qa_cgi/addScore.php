<?php

	session_start();
	require "connect.php";

	$id = $_POST['id'];
	$score = $_POST['score'];
	$table = $_POST['table'];
	$fration = $_POST['fration'];
	$topic = $_POST['topic'];
	$status = $_POST['status'];

	$uid = $_SESSION['uid'];
	
	$uquery = mysql_query("SELECT `vote` FROM `users` WHERE `oauth_uid` = $uid") or die(mysql_error());
	$urow = mysql_fetch_assoc($uquery);

	$score = $urow['vote'] * $score;
	$scoreQuery = mysql_query("UPDATE `5_".$fration.$topic.$status.$table."` SET grade = grade + '$score' WHERE `id` = $id") or die(mysql_error());

	$uquery = mysql_query("SELECT `grade` FROM `5_".$fration.$topic.$status.$table."` WHERE `id` = $id") or die(mysql_error());
	$urow = mysql_fetch_assoc($uquery);
	echo json_encode($urow);
?>
