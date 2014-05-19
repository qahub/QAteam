<?php
	
	require "connecnt.php";
	require "classUserTry.php";

	session_start();

	$uid = $_POST['uid'];
	$username = $_POST['username'];
	$fration = $_POST['fration'];

	$user = new User($username, $uid, $fration);
	$user->insertIntoDB();	

	$userData = $user->getUserData();
	$_SESSION['uid'] = $userData['oauth_uid'];
	$_SESSION['username'] = $userData['username'];
	$_SESSION['fration'] = $userData['fration'];

?>
