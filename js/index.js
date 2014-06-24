function link(webName) {

	$('#page').html();
	$.ajax({

		url: webName,
		type: 'GET',
		datatype: 'html',
		success: function(data) {
			$('#page').html(data);

		},
		error: function(xhr) {
			alert('link error '+xhr.status);
		}

	});

}

function normalLink(webName){

	document.location.href=webName;

}

$(document).ready( function () {

	$('nav').hover(function(){

		$(this).stop(true,false).animate({'left' : '0%'},500);

	}, function(){
	
		$(this).stop(true,false).animate({'left' : '-100%'},500);

	});


	$('#aboutUs').click( function() {

		link('aboutUS.html');

	});

	$('#home').click( function() {

		link('main.php');

	});

	$('#black').click(function() {

		normalLink("forums.php?fration=2&status='A'");

	});

	$('#white').click(function() {

		normalLink("forums.php?fration='1'&status='A'");

	});

	$('#login').click(function() {

		normalLink('signup.html');

	});

	$('#logout').click(function() {

		logout();	

	});

});
