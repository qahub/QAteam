function checkUser(id, username, type){

	$.ajax({
		url: 'qa_cgi/signup.php',
		type: 'POST',
		data: { uid: id, username: username, type: type },
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

			if(response.status == "not_authorized"){

				FB.login(function(response){
					if(response.authResponse){
						FB.api('/me', function(response){ checkUser(response.id, response.name, 'FB'); });
					}else{
						alert('login error!');
					}
				},{});

			}else if(response.status == "connected"){

				if(response.authResponse){
					FB.api('/me', function(response){
						checkUser(response.id, response.name, 'FB');
					});
				}else{
					alert('login error!');
				}

			}else {

				FB.login(function(response){
					if(response.authResponse){
						FB.api('/me', function(response){checkUser(response.id, response.name, 'FB');});
					}else{
						alert('login error!');
					}
				},{});

			}

		});

	});

});
