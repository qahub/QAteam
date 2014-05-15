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
						dataType: 'json',
						data: { uid : _uid, username : _username, comment : _comment, fration : _fration, topic : _topic, table : _table },
						success: function(data){
							$('#input_comment_area').val("");
							$('#allComment').append("<div class='comment'><div><span class='name'>"+data.name+" </span><span class='comment'>"+data.comment+"</span></div><div><span class='dateTime'>"+data.dateTime+"</span><span class='grade'> 0</span></div></div>");
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

