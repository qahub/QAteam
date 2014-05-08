<?php

	require("../../facebook-php-sdk/facebook.php");
	require("classUser.php");

	$config = array("

		'appId' => '290145247828323',
		'secret' => '9ec405488a9dce4035a8217f97d02e1c',
		'fileUpolad' => false,
		'allowSignedRequest' => false,

		");

	$facebook = new Facebook($config);
	$user = $facebook ->getUser();
	if($user){
		try{
			$user_profile = $facebook->api('/me');
		} catch (FacebookApiException $e) {
			error_log($e);
			$user = null;
		}
		if(!empty($user_profile)){
			$username = $user_profile['name'];
			$uid = $user_profile['id'];

			$user = new User();
			$user->checkUserIfNotAdd($uid, $username);
			$userdata = $user->getUserData($uid, $username);
			if(!empty($userdata)){
				session_start();
				$_SESSION['uid'] = $uid;
				$_SESSION['username'] = $userdata['username'];
			} else {
				die("There was an error.");
			}
		}

	} else {
		$login_url = $facebook->getLoginUrl(array('scope'=>'email'));
		header("Location: ".$login_url);
	}
	


?>
