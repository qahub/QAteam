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

$(document).ready( function () {

	$('nav').hover(function(){

		$(this).stop(true,false).animate({'left' : '0%'},500);

	}, function(){
	
		$(this).stop(true,false).animate({'left' : '-100%'},500);

	});

	link('main.php');

	$('#aboutUs').click( function() {

		link('aboutUS.html');

	});

	$('#home').click( function() {

		link('main.php');

	});

});
