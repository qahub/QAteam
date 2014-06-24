function normalLink(webName){

	document.location.href=webName;

}

function link(webName){

	document.location.href='index.php?web='+webName;

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

		normalLink('forums.php?fration=2');

	});

	$('#white').click(function() {

		normalLink('forums.php?fration=1');

	});

	$('#login').click(function() {

		normalLink('signup.html');

	});

	$('#logout').click(function() {

		logout();	

	});

});
