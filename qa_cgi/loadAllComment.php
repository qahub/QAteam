<?php 
	session_start();
	require "connect.php";
	$topic = $_GET['topic'];
	$table = $_GET['table'];
	if($_GET['fration'] == 2) $fration = 'Black';
	else $fration = 'White';
	$status = $_GET['status'];
	$uid = $_SESSION['uid'];

?>

<script>
	var topic = '<?php echo $topic; ?>';
	var table = '<?php echo $table; ?>';
	var fration = '<?php echo $fration; ?>';	
	var sta = '<?php echo $status; ?>';
</script>

<?php
	
	$cquery = mysql_query("SELECT * FROM `5_".$fration.$topic.$status.$table."` ORDER BY `grade` DESC"); 
	while(($crow = mysql_fetch_assoc($cquery)) != FALSE ) {

		$ssrow = explode(",",$crow['evaluate']);
		$key = array_search($uid, $ssrow);

		if($key != false) {  // exist
			$check =  1;
		}else {
			$check =  0;
		}


		if(strlen($crow['comment']) > 60) {
			$comment = mb_substr($crow['comment'],0,60,'utf8')."...";
		}else{
			$comment = $crow['comment'];
		}
?>
			<div class='comment'>
				<div class='leftcom'>
					<div class='name_n_date'>
						<span class='name' onclick="showProfile($(this).children().text());"><?php echo $crow['username']; ?> 
							<p style="visibility:hidden"> <?php echo $crow['uid']; ?> </p>
						</span>
						<span class='dateTime'><?php echo $crow['date']." ".$crow['time']; ?></span>
					</div>
					<div class='com'>
						<span class='comment'><?php echo $comment; ?></span>
						<div class='more' onclick="openAllComment(<?echo $crow['id'];?>);">read more</div>
					</div>	
				</div>
				<div class='rightcom'>
				<?php if(($_SESSION['fration']==$_GET['fration']) && $check != 1 ){ ?>
				<span class='vote' onclick="score(<?php echo $crow['id']; ?>, $(this).offset(),fration,topic,table,sta);">vote</span>	
				<?php }else{ ?>
				<span class='vote'>vote</span>
				<?php }?>
				<span class="minus">______________</span>
					<span class='grade _<?php echo $crow['id'];?>'><?php echo $crow['grade']; ?></span>	
				</div>
			</div>

<?php } ?>

