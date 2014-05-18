<?php 

	require "connect.php";
	$topic = $_GET['topic'];
	$table = $_GET['table'];
	if($_GET['fration'] == 0) $fration = 'Black';
	else $fration = 'White';

	$cquery = mysql_query("SELECT * FROM `5_".$fration.$topic.$table."` ORDER BY `grade` DESC") or die(mysql_error()); 
	while(($crow = mysql_fetch_assoc($cquery)) != FALSE ) {
?>
			<div class='comment'>
				<div class='leftcom'>
					<div class='name_n_date'>
						<span class='name'><?php echo $crow['username']; ?> </span>
						<span class='dateTime'><?php echo $crow['date']." ".$crow['time']; ?></span>
					</div>
					<div class='com'>
						<span class='comment'><?php echo nl2br($crow['comment']); ?></span>
					</div>	
				</div>
				<div class='rightcom'>
					<span class='grade'><?php echo $crow['grade']; ?></span>	
					<span class='scoreButton' onclick='score(<?php echo $crow['id']; ?>, $(this).offset())'> score</span>	
				</div>
			</div>
<?php } ?>

