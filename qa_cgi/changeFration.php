<?php
	
	require "connect.php";
	require "classUserTry.php";

	session_start();

	$uid = $_POST['uid'];
	$username = $_POST['username'];
	$fration = $_POST['newfration'];

	$user = new User($username, $uid, $fration);
	$user->updateDB('fration', $fration);

	$userData = $user->getUserData();
	$_SESSION['fration'] = $userData['fration'];
 
?>
