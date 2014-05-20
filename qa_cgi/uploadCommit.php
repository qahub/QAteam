<?
	include('connect.php');

	$uid = $_POST['uid'];
	$username = $_POST['username'];
	$comment = $_POST['comment'];
	$fration = $_POST['fration'];
	$topic = $_POST['topic'];
	$table = $_POST['table'];
	$date = date('Ymd');
	$time  = date('H:i:s', time());

	if(!(empty($comment))){


			$query = "INSERT INTO `5_".$fration.$topic.$table."`(`uid`, `comment`, `date`, `username`, `time`) VALUES('$uid', '$comment', '$date', '$username', '$time')";


		$result = mysql_query($query) or die(mysql_error());
		echo json_encode(array( 'name' => $username, 'comment' => $comment, 'dateTime' => $date." ".$time));

	} else {

		echo "No Comment";

	}
 
?>
