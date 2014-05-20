<?php 
	session_start();
	require "connect.php";
	$topic = $_GET['topic'];
	$table = $_GET['table'];
	if($_GET['fration'] == 2) $fration = 'Black';
	else $fration = 'White';
?>

<script>
	var topic = '<?php echo $topic; ?>';
	var table = '<?php echo $table; ?>';
	var fration = '<?php echo $fration; ?>';
</script>

<?php
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
						<span>more</span>
					</div>	
				</div>
				<div class='rightcom'>
				<?php if($_SESSION['fration']==$_GET['fration']){ ?>
				<span class='vote' onclick="score(<?php echo $crow['id']; ?>, $(this).offset(),fration,topic,table);">vote</span>	
				<?php }else{ ?>
				<span class='vote'>vote</span>
				<?php }?>
				<span class="minus">______________</span>
					<span class='grade _<?php echo $crow['id'];?>'><?php echo $crow['grade']; ?></span>	
				</div>
			</div>
<?php } ?>

