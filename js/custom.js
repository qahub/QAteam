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
				<span id='regButton' class='button'>送出</span>
				<span id='cancelButton' class='button'>取消</span>
			</div>
			</div>
		");
*/
	$('#page').append("<div id='mask'></div>");
	$('#page').append("<div id='register'><div id='explain'>選擇你投靠的討論的陣營</div><div id='item'><ol class='frationItem'><input type='radio' name='fraRadio' id='fraRadio' value='2'>正方</ol><ol class='frationItem'><input type='radio' name='fraRadio' id='fraRadio' value='0' checked>中立方</ol><ol class='frationItem'><input type='radio' id='fraRradio' name='fraRadio' value='1'>反方</ol></div><div id='button'><div id='regButton' class='button'>送出</div><div id='cancelButton' class='button' onclick='cancel()'>取消</div></div></div>");
	$('#mask').click(cancel);
	$('#regButton').click(function(){ changeFration(id,username);});
}

function cancel(){

	$('#register').remove();
	$('#mask').remove();

}

function changeFration(_uid, _username){

	var _fration = $("input[name='fraRadio']:checked").val();
	$.ajax({

		url: "qa_cgi/changeFration.php",
		type: "POST",
		data: { uid : _uid, username : _username, newfration : _fration },
		dataType: "json",
		success: function() {

			$('#register').remove();
			document.location.href="index.php";

		},
		error: function(xhr) {

			alert(xhr.status);

		}


	});

}
