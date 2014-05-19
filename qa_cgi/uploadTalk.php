<?
	include('connect.php');

	$uid = $_POST['uid'];
	$username = $_POST['username'];
	$talk = $_POST['talk'];
	$topic = $_POST['topic'];
	$date = date('Ymd');
	$time  = date('H:i:s', time());

	if(!(empty($talk))){

		$query = "INSERT INTO `5_FreeTalk".$topic."`(`uid`, `talk`, `date`, `username`, `time`) VALUES('$uid', '$talk', '$date', '$username', '$time')";

		$result = mysql_query($query) or die(mysql_error());
		echo json_encode(array( 'name' => $username, 'talk' => $talk, 'dateTime' => $date." ".$time));

	} else {

		echo "No Comment";

	}
 
?>
