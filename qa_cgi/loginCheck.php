<?php

	require("../facebook-php-sdk/src/facebook.php");
	require("classUserTry.php");
	require("connect.php");

	$config = array(

		'appId' => '290145247828323',
		'secret' => '9ec405488a9dce40e5a8217f97d02e1c',
		'fileUpolad' => false,
		'allowSignedRequest' => false

		);
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

			$user = new User($username,$uid,0);
			$checkResult = $user->checkUserIfNotAdd();
			if($checkResult){
				$userdata = $user->getUserData();
				echo $user->uid;
				session_start();
				$_SESSION['uid'] = $userdata['oauth_uid'];
				$_SESSION['username'] = $userdata['username'];
				$_SESSION['fration'] = $userdata['fration'];
				echo json_encode(array('result' => $checkResult, 'uid' => $userdata['oauth_uid'], 'username' => $userdata['username']));
			} else {
				echo json_encode(array('result' => $checkResult,'uid' => $uid, 'username' => $username));
			}
		}

	} 
/*	else {
		$login_url = $facebook->getLoginUrl(array('scope'=>'email'));
		header("Location: ".$login_url);
	} 

	do it in js.	
*/

?>
