<?php

	session_start();
	require "connect.php";

	$id = $_POST['id'];
	$score = $_POST['score'];
	$table = $_POST['table'];
	$fration = $_POST['fration'];
	$topic = $_POST['topic'];

	$uid = $_SESSION['uid'];
	
	$uquery = mysql_query("SELECT `vote` FROM `users` WHERE `oauth_id` = $uid") or die(mysql_error());
	$urow = mysql_fetch_assoc($uquery);

	$score = $urow['vote'] * $score;
	$scoreQuery = mysql_query("UPDATE `5_".$fration.$topic.$table."` SET grade = grade + '$score' WHERE `id` = $id") or die(mysql_error());


?>
