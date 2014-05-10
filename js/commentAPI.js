function uploadComment(_uid, _comment, _fration, _topic, _table){

	$.ajax({
		url: '../qa_cgi/uploadCommit.php',
		type: "POST",
		data: { uid : _uid, comment : _comment, fration : _fration, topic : _topic, table : _table },
		dataType: "json",
		success: function(){

		},
		error: function



	});


}
