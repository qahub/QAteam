<?php

class User {

	var $id;
	var $name;
	var $uid;
	var $fration;

	function __construct($_name, $_uid, $_fration){
		$this->name = $_name;
		$this->uid = $_uid;
		$this->fration = $_fration;
	}


	public function checkUserIfNotAdd(){
		$query = mysql_query("SELECT * FROM `users` WHERE `oauth_uid` = '$this->uid'") or die(mysql_error());
		$total = mysql_num_rows($query);
		if($total<1){
			return false;
		}else{
			return true;
		}

	}
	public function insertIntoDB(){
		$insertQuery = mysql_query("INSERT INTO `users`(`oauth_uid`, `username`, `fration`) VALUES('$this->uid', '$this->name', '$this->fration')") or die(mysql_error());

	}
	public function getUserData(){

		$query = mysql_query("SELECT * FROM `users` WHERE `oauth_uid` = '$this->uid'");
		$row = mysql_fetch_assoc($query);
		return $row;

	}

	public function login(){

		$row = $this->getUserData();
		$_SESSION['uid'] = $row['id'];
		$_SESSION['username'] = $row['username'];

	}

	public function logout(){

		$_SESSION['id'] = "";
		$_SESSION['name'] = "";	

	}

}


?>
