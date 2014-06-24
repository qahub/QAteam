function loadAllComment(_fration, _topic, _table, _status) {

	$.ajax({

		url: "qa_cgi/loadAllComment.php",
		type: 'get',
		dataType: 'html',
		data: { topic : _topic, table : _table, fration : _fration, status : _status },
		success: function(data) {

			$('#allComment').html(data);

		},
		error: function(xhr) {
//			alert(xhr.status);
		},

	});

	setTimeout(function(){ loadAllComment(_fration, _topic, _table, _status)}, 10000);

}

function uploadCommit( _uid, _username, _fration, _topic, _table, _status){


	var _comment = $('#reply').val();

		$.ajax({

			url: "qa_cgi/uploadCommit.php",
			type: 'post',
			dataType: 'json',
			data: { uid : _uid, username : _username, comment : _comment, fration : _fration, topic : _topic, table : _table, status : _status },
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

function score(id,pos,fration,topic, table, sta){
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
		$('.suck_'+5).click(function() { addScore(-5, id, fration, topic, table,sta);});
		$('.suck_'+4).click(function() { addScore(-4, id, fration, topic, table,sta);});
		$('.suck_'+3).click(function() { addScore(-3, id, fration, topic, table,sta);});
		$('.suck_'+2).click(function() { addScore(-2, id, fration, topic, table,sta);});
		$('.suck_'+1).click(function() { addScore(-1, id, fration, topic, table,sta);});
		$('.good_'+1).click(function() { addScore(1, id, fration, topic, table,sta);})
		$('.good_'+2).click(function() { addScore(2, id, fration, topic, table,sta);})
		$('.good_'+3).click(function() { addScore(3, id, fration, topic, table,sta);})
		$('.good_'+4).click(function() { addScore(4, id, fration, topic, table,sta);})
		$('.good_'+5).click(function() { addScore(5, id, fration, topic, table,sta);})

}

function addScore(_score, _id, _fration, _topic, _table,_status){
	$.ajax({
		url: "qa_cgi/addScore.php",
		type: "POST",
		data: { score : _score, id : _id, fration : _fration, topic : _topic, table : _table, status : _status},
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

function openSet(e, _topic, _fration, _table, _status){

	function openAllComment(_id){
	
		$('#allmask').css("visibility","visible");
		$('#all').css("visibility","visible");

		$.ajax({

			url: 'qa_cgi/loadFullComment.php',
			data: { id : _id ,topic : _topic, fration : _fration, table : _table, status : _status },
			type: "GET",
			dataType: "json",
			success: function(data){

				$('#allAuthor').append(data.username);
				$('#allContent').append(data.comment);
				$('#replyButton').click(function(){uploadReply(_id, _fration, _topic, _table, _status)});
				loadAllReply(_fration, _topic, _table, _id, _status);
				$('#replyArea').keydown(function(e){inputKeyDown(e, _id, _fration, _topic, _table, _status);});
				
			},
			error: function(xhr){
				alert("ajax error");
				console.log(xhr.status);
			}
	
		});	
	
	}
	return openAllComment;

}

function showProfile(_uid)
{
	$('#profile').css("visibility","visible");
	$('#allmask').css("visibility","visible");
	alert(_uid);
	
}

function uploadReply(_qid, _fration, _topic, _table, _status){


	var _reply = $('#replyArea').val();
	if( _reply == "") return;
		$.ajax({

			url: "qa_cgi/addReplyToComment.php",
			type: 'post',
			dataType: 'json',
			data: { qid : _qid, reply : _reply, fration : _fration, topic : _topic, table : _table, status : _status },
			success: function(data){
				$('#replyArea').val("");
				$('#allReply').append("\
						<div class='eachReply'> \
							<div class='replyName'>"+data.username+"</div>\
							<div class='replyContent'>"+data.reply+"</div>\
							<div class='replyLine'></div>\
						</div>\
					");

			},
			error: function(xhr,ajaxOptions, thrownError){
//					alert(xhr.status);		
//					alert(xhr.responseText);
//					alert(thrownError);
			}

		});

}

function loadAllReply(_fration, _topic, _table, _qid, _status) {

	$.ajax({

		url: "qa_cgi/loadAllReply.php",
		type: 'get',
		dataType: 'html',
		data: { topic : _topic, table : _table, fration : _fration, qid : _qid, status : _status },
		success: function(data) {

			$('#allReply').html(data);

		},
		error: function(xhr) {
//			alert(xhr.status);
		},

	});


}

function inputKeyDown(e, _qid, _fration, _topic, _table, _status){

	if(e.which == 13 && !(e.shiftKey) ){ // if press Enter
		uploadReply(_qid, _fration, _topic, _table, _status);
	}

}
