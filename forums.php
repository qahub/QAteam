<html>
<head>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script>

	$(document).ready(function(){

		$('#input_comment_area').keydown(function(event){

			if(event.which == 13 && !(event.shiftKey) ){ // if press Enter

				var _comment = $('#input_comment_area').val();
				var _uid = '123123';
				var _username = 'Jax';
				var _fration = '0';
				var _topic = 'Nuclear';
				var _table = '1';

					$.ajax({
						url: "qa_cgi/uploadCommit.php",
						type: 'post',
						data: { uid : _uid, username : _username, comment : _comment, fration : _fration, topic : _topic, table : _table },
						success: function(data){
							alert(data);	
						},
						error: function(xhr,ajaxOptions, thrownError){
							alert(xhr.status);		
							alert(xhr.responseText);
							alert(thrownError);
						}

					});


			}

		});	
 
	});

</script>
</head>
<body>
	<form id='add_comment_form'>
		<textarea id='input_comment_area'></textarea>
	</form> 
</body>
</html>
