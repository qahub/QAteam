function getSomeInformation(id, username){
/*
	$('body').append("
			<div id='register'>
			<div id='explain'>選擇你想要加入討論的陣營</div>
			<div id='item'>
				<ol class='frationItem'><input type='radio' name='fraRadio' value='2'>正方</ol>
				<ol class='frationItem'><input type='radio' name='fraRadio' value='0' checked>中立方</ol>
				<ol class='frationItem'><input type='radio' name='fraRadio' value='1'>反方</ol>
			</div>
			<div id='button'>
				<span id='regButton' class='button' onclick='firstLogin("+id+","+username+")'>送出</span>
				<span id='cancelButton' class='button' onclick='cancel()'>取消</span>
			</div>
			</div>
		");
*/
	$('#page').append("<div id='mask'></div>");
	$('#page').append("<div id='register'><div id='explain'>選擇你想要加入討論的陣營</div><div id='item'><ol class='frationItem'><input type='radio' name='fraRadio' id='fraRadio' value='2'>正方</ol><ol class='frationItem'><input type='radio' name='fraRadio' id='fraRadio' value='0' checked>中立方</ol><ol class='frationItem'><input type='radio' id='fraRradio' name='fraRadio' value='1'>反方</ol></div><div id='button'><div id='regButton' class='button'>送出</div><div id='cancelButton' class='button' onclick='cancel()'>取消</div></div></div>");
	$('#mask').click(cancel);
	$('#regButton').click(function(){firstLogin(id,username);});
}

function cancel(){

	$('#register').remove();
	$('#mask').remove();

}

function checkUser(){

	$.ajax({
		url: 'qa_cgi/loginCheck.php',
		type: 'POST',
		dataType: 'json',
		success: function(data){
			if(data.result){
			 	document.location.href="index.php";
			}else{ 
				getSomeInformation(data.uid, data.username);
				
			}
		},
		error: function(xhr, ajaxOptions, thrownError){
			alert('ajax error');
			console.log(xhr.status);
			console.log(ajaxOptions);
			console.log(thrownError);
		},
		complete: function() {
			startspin();
		}

	});

}

function firstLogin(_uid, _username){

	var _fration = $("input[name='fraRadio']:checked").val();
	$.ajax({

		url: "qa_cgi/register.php",
		type: "POST",
		data: { uid : _uid, username : _username, fration : _fration },
		dataType: "json",
		success: function() {

			$('#register').remove();
			document.location.href="index.php";

		},
		error: function(xhr) {

			alert(xhr.status);

		},
		complete: function() {
			startspin()
		}


	});

}

function logout(){

	$.ajax({
		url: 'qa_cgi/logout.php',
		type: 'GET',
		data: { },
		success: function(response){
			 document.location.href="index.php";
		},
		error: function(xhr, ajaxOptions, thrownError){
			alert('ajax error');
			console.log(xhr.status);
			console.log(ajaxOptions);
			console.log(throwError);
		}

	});

}
$(document).ready( function(){ 


	$('#logout').click(logout);

	(function(d){
		var js;
		var id = 'facebook-jssdk';
		var ref = d.getElementsByTagName('script')[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "http://connect.facebook.net/en_US/all.js";
		ref.parentNode.insertBefore(js,ref);
	}(document));


	$("#fb_link").click( function () {

		window.fbAsyncInit = function() {
			FB.init({
				appId : '290145247828323',
				status: true,
				xfbml : true,
				cookie: true
			});

		}();
		FB.getLoginStatus(function(response) {

			if(response.status == "connected"){

				if(response.authResponse){
					FB.api('/me', function(response){
						checkUser();
					});
				}else{
					alert('login error!');
				}
			}
			else if(response.status == "not_authorized"){

				FB.login(function(response){
					if(response.authResponse){
						checkUser();
					}else{
						alert('login error!');
					}
				},{});

			}else{    // no login

				FB.login(function(response){
					if(response.authResponse){
						checkUser();
					}else{
						alert('login error!');
					}
				},{});

			}

		});

	});

});

function startspin(){

	var opts = {
	  lines: 17, // The number of lines to draw
	  length: 35, // The length of each line
	  width: 29, // The line thickness
	  radius: 55, // The radius of the inner circle
	  corners: 0.9, // Corner roundness (0..1)
	  rotate: 82, // The rotation offset
	  direction: 1, // 1: clockwise, -1: counterclockwise
	  color: '#000', // #rgb or #rrggbb or array of colors
	  speed: 2.2, // Rounds per second
	  trail: 60, // Afterglow percentage
	  shadow: false, // Whether to render a shadow
	  hwaccel: false, // Whether to use hardware acceleration
	  className: 'spinner', // The CSS class to assign to the spinner
	  zIndex: 2e9, // The z-index (defaults to 2000000000)
	  top: '50%', // Top position relative to parent
	  left: '50%' // Left position relative to parent
	};
	var target = document.getElementById('signal');
	var spinner = new Spinner(opts).spin(target);
}