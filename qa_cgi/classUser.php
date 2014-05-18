<?php

class User {

	var $id;
	var $name;
	var $uid;
	var $type;

	function __construct($_name, $_uid, $_type){
		$this->name = $_name;
		$this->uid = $_uid;
		$this->type = $_type;
	}


	public function checkUserIfNotAdd(){
		$query = mysql_query("SELECT * FROM `users` WHERE `oauth_uid` = '$this->uid'") or die(mysql_error());
		$total = mysql_num_rows($query);
		if($total<1){
			$this->insertIntoDB();
		}

	}
	private function insertIntoDB(){
		$insertQuery = mysql_query("INSERT INTO `users`(`oauth_uid`, `username`, `type`) VALUES('$this->uid', '$this->name', '$this->type')") or die(mysql_error());

	}

	public function getUserData(){

		$query = mysql_query("SELECT * FROM `qateam.users` WHERE `oauth_uid` = '$this->uid'");
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
