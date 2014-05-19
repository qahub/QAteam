function inputKeyDown(e, _uid, _username){


	if(e.which == 13 && !(e.shiftKey) ){ // if press Enter

		var _comment = $('#input_talk_area').val();


			$.ajax({

				url: "qa_cgi/uploadTalk.php",
				type: 'post',
				dataType: 'json',
				data: { uid : _uid, username : _username, comment : _comment },
				success: function(data){
					$('#input_talk_area').val("");
					$('#freeTalk').append("<div class='talkBlock'><span class='username'>"+data.username+"</span><span class='talk'>"+data.comment+"</span></div>");
				},
				error: function(xhr,ajaxOptions, thrownError){
//					alert(xhr.status);		
//					alert(xhr.responseText);
//					alert(thrownError);
				}

			});

	}

}


