<?php

	include('connect.php');
	include('classUser.php');
	session_start();
	$uid = $_POST['uid'];
	$username = $_POST['username'];
	$type = $_POST['type'];

	$user = new User($username, $uid, $type);
	$user->checkUserIfNotAdd();
//	$user->login();
	
	$_SESSION['uid'] = $uid;
	$_SESSION['username'] = $username;

?>
