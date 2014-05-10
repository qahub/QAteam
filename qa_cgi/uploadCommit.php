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

		if($fration == 0){

			$query = "INSERT INTO `5_Black".$topic.$table."`(`uid`, `comment`, `date`, `username`, `time`) VALUES('$uid', '$comment', '$date', '$username', '$time')";

		}else{

			$query = "INSERT INTO `5_White".$topic.$table."`(`uid`, `comment`, `date`, `username`, `time`) VALUES('$uid', '$comment', '$date', '$username', '$time')";

		}

		$result = mysql_query($query) or die(mysql_error());

	} else {

		echo "No Comment";

	}
 
?>
