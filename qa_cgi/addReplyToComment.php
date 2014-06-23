<?php

	require "connect.php";
	session_start();
	
	$uid = $_SESSION['uid'];
	$username = $_SESSION['username'];
	$qid = $_POST['qid'];
	$topic = $_POST['topic'];
	$fration = $_POST['fration'];
	$table = $_POST['table'];
	$tableName = "5_".$fration.$topic.$table."_".$qid;
	$date = date('Ymd');
	$time  = date('H:i:s', time());

	$createQuery = mysql_query("
		CREATE TABLE IF NOT EXISTS `$tableName`(
			id int(4) PRIMARY KEY AUTO_INCREMENT,
			uid varchar(50) NOT NULL,
			username varchar(50) NOT NULL,
			reply MEDIUMTEXT, 
			date date,
			time time
		);") or die(mysql_error());

	$addQuery = mysql_query("INSERT INTO `$tableName`(`uid`, `username`, `reply`, `date`, `time`) 
							VALUES('$uid', '$username', '$reply', '$date', '$time');") or die(mysql_error());		

	echo json_encode(array('date' => $date, 'time' => $time, 'uid' => $uid, 'username' => $username, 'reply' => $reply));

?>
