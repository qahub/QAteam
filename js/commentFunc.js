function loadAllComment(_fration, _topic, _table) {

	$.ajax({

		url: "qa_cgi/loadAllComment.php",
		type: 'get',
		dataType: 'html',
		data: { topic : _topic, table : _table, fration : _fration },
		success: function(data) {

			$('#allComment').html(data);

		},
		error: function(xhr) {
//			alert(xhr.status);
		},

	});

	setTimeout(function(){ loadAllComment(_fration, _topic, _table)}, 50000);

}

function inputKeyDown(event, _uid, _username, _fration, _topic, _table){

	if(event.which == 13 && !(event.shiftKey) ){ // if press Enter

		var _comment = $('#input_comment_area').val();

			$.ajax({

				url: "qa_cgi/uploadCommit.php",
				type: 'post',
				dataType: 'json',
				data: { uid : _uid, username : _username, comment : _comment, fration : _fration, topic : _topic, table : _table },
				success: function(data){
					$('#input_comment_area').val("");
					$('#allComment').append("<div class='comment'><div class='name_n_date'><span class='name'>"+data.name+" </span><span class='dateTime'>"+data.dateTime+"</span></div><div class='com'><span class='comment'>"+data.comment+"</span></div><span class='grade'> 0</span></div>");
				},
				error: function(xhr,ajaxOptions, thrownError){
//					alert(xhr.status);		
//					alert(xhr.responseText);
//					alert(thrownError);
				}

			});

	}

}

function score(id,pos){

	var x = pos.left+20;
	var y = pos.top-5;
	var i = 0;

	$('body').append("<div id='vote"+id+"' class='vote' style='position:absolute; left:"+x+"; top:"+y+"'></div>");

	for(i=5;i>0;i--){
		$('#vote'+id).append("<span class='suck_"+i+" scoreButton' onclick='addScore(-"+i+","+id+");'>-"+i+"</span>");
	}
	for(i=1;i<=5;i++){
		$('#vote'+id).append("<span class='good_"+i+" scoreButton' onclick='addScore("+i+","+id+");'>"+i+"</span>");
	}

}


