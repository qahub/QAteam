<?php

	include('connect.php');
	include('classUser.php');
	$uid = $_POST['uid'];
	$username = $_POST['username'];
	$type = $_POST['type'];

	$user = new User($username, $uid, $type);
	$user->checkUserIfNotAdd();
	$user->login();

?>
