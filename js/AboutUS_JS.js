$(document).ready(function(){

	var c = document.getElementById('C_line');
	var ctx = c.getContext('2d');
	var line_height = c.height;

	ctx.beginPath();
	ctx.moveTo(0,0);
	ctx.lineTo(0,line_height);	
	ctx.lineTo(0,0);
	ctx.closePath();
	ctx.lineWidth = 50;
	ctx.stroke();
	
	$('#t1').hover(function(){
		
		$('#introduction').html('工程<br><br>林冠勳 資訊102').animate({opacity:"1"},200);
	},function(){ 
			$('#introduction').html('').css("opacity","0");
	}
	
	);
	
	$('#t2').hover(function(){
		
		$('#introduction').html('企劃<br><br>吳孟軒 企管103').animate({opacity:"1"},200);
	
	},function(){ $('#introduction').html('').css("opacity","0");}
	
	);	

	$('#t3').hover(function(){
		
		$('#introduction').html('企劃<br><br>劉琪元 企管103').animate({opacity:"1"},200);
	
	},function(){ $('#introduction').html('').css("opacity","0");}
	
	);	

	$('#t4').hover(function(){
		
		$('#introduction').html('企劃<br><br>李弘毅 企管103').animate({opacity:"1"},200);
	
	},function(){$('#introduction').html('').css("opacity","0");}
	
	);	

	$('#t5').hover(function(){
		
		$('#introduction').html('設計<br><br>胡德瑄 工設所碩一').animate({opacity:"1"},200);
	
	},function(){ $('#introduction').html('').css("opacity","0");}
	
	);

	$('#t6').hover(function(){
		
		$('#introduction').html('工程<br><br>薛智豪 資訊104').animate({opacity:"1"},200);
	
	},function(){ $('#introduction').html('').css("opacity","0");}
	
	);

	$('#t7').hover(function(){
		
		$('#introduction').html('工程<br><br>劉家瑄 資訊104').animate({opacity:"1"},200);
	
	},function(){ $('#introduction').html('').css("opacity","0");}
	
	);
	
	
});