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

	setTimeout(function(){ loadAllComment(_fration, _topic, _table)}, 10000);

}

function uploadCommit( _uid, _username, _fration, _topic, _table){


	var _comment = $('#reply').val();

		$.ajax({

			url: "qa_cgi/uploadCommit.php",
			type: 'post',
			dataType: 'json',
			data: { uid : _uid, username : _username, comment : _comment, fration : _fration, topic : _topic, table : _table },
			success: function(data){
				$('#input_comment_area').val("");
				// $('#allComment').append("<div class='comment'><div class='name_n_date'><span class='name'>"+data.name+" </span><span class='dateTime'>"+data.dateTime+"</span></div><div class='com'><span class='comment'>"+data.comment+"</span></div><span class='grade'> 0</span></div>");
				if(_fration == 'White'){
					document.location.href="forums.php?fration=1";
				}else{
					document.location.href="forums.php?fration=2";
				}
			},
			error: function(xhr,ajaxOptions, thrownError){
//					alert(xhr.status);		
//					alert(xhr.responseText);
//					alert(thrownError);
			}

		});

}

function score(id,pos,fration,topic,table){
	var x = pos.left+40;
	var y = pos.top-5;
	var i = 0;
	$('.votePart').remove();
	$('body').append("<div id='vote"+id+"' class='votePart' style='position:absolute; left:"+x+"; top:"+y+"'></div>");
	$('#vote'+id).append("<span class='leftVote"+id+" leftV'></span>");
	$('#vote'+id).append("<span class='rightVote"+id+" rightV'></span>");

	for(i=5;i>0;i--){
		$('.leftVote'+id).append("<div class='suck_"+i+" scoreButton'>-"+i+"</div>");
	}
	for(i=1;i<=5;i++){
		$('.rightVote'+id).append("<div class='good_"+i+" scoreButton'>"+i+"</div>");
	}
		$('.suck_'+5).click(function() { addScore(-5, id, fration, topic, table);});
		$('.suck_'+4).click(function() { addScore(-4, id, fration, topic, table);});
		$('.suck_'+3).click(function() { addScore(-3, id, fration, topic, table);});
		$('.suck_'+2).click(function() { addScore(-2, id, fration, topic, table);});
		$('.suck_'+1).click(function() { addScore(-1, id, fration, topic, table);});
		$('.good_'+1).click(function() { addScore(1, id, fration, topic, table);})
		$('.good_'+2).click(function() { addScore(2, id, fration, topic, table);})
		$('.good_'+3).click(function() { addScore(3, id, fration, topic, table);})
		$('.good_'+4).click(function() { addScore(4, id, fration, topic, table);})
		$('.good_'+5).click(function() { addScore(5, id, fration, topic, table);})

}

function addScore(_score, _id, _fration, _topic, _table){
	$.ajax({
		url: "qa_cgi/addScore.php",
		type: "POST",
		data: { score : _score, id : _id, fration : _fration, topic : _topic, table : _table },
		dataType: 'json',
		success: function (data) {
			
			$('#vote'+_id).html("Thank you for your vote !").css({'width':'200px','height':'40px','color':'#fff', 'font-size':'13pt', 'border-radius':'5px','padding':'5px'});
			setTimeout(function(){ $('#vote'+_id).remove(); }, 1000);
			$('._'+_id).html(data.grade);

		},
		error: function(xhr) {

			alert(xhr.status);
		}


	});

}

