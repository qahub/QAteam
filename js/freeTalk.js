function loadAllFreeTalk(_topic) {

	$.ajax({

		url: "qa_cgi/loadAllTalk.php",
		type: 'get',
		dataType: 'html',
		data: { topic : _topic },
		success: function(data) {

			$('#freeTalk').html(data);

		},
		error: function(xhr) {
//			alert(xhr.status);
		},

	});

	setTimeout(function(){ loadAllFreeTalk(_topic)}, 50000);

}

function inputKeyDown(e, _uid, _username, _topic){


	if(e.which == 13 && !(e.shiftKey) ){ // if press Enter

		var _talk = $('#input_talk_area').val();

			$.ajax({

				url: "qa_cgi/uploadTalk.php",
				type: 'post',
				dataType: 'json',
				data: { uid : _uid, username : _username, talk : _talk, topic : _topic },
				success: function(data){
					$('#input_talk_area').val("");
					$('#freeTalk').append("<div class='talkBlock'><span class='username'>"+data.name+": </span><span class='talk'>"+data.talk+"</span></div>");
				},
				error: function(xhr,ajaxOptions, thrownError){
//					alert(xhr.status);		
//					alert(xhr.responseText);
//					alert(thrownError);
				}

			});

	}

}


