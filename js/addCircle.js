	function openAll(){
	
		$('#mask').css("visibility","visible");
		$('#all').css("visibility","visible");
	
	}

	function circleSet(){

		var _count = 0;
		function drawCircle(faction){
			if(faction == 0){
				$('#leftboard').append(" 			  \
					<div id='pos"+_count+"' class='blackBorder'>						\
						<canvas id='blackCircle"+_count+"' class='absolute' width=200px height=200px></canvas>  \
						<div id='p_title"+_count+"' class='p _title absolute'></div>  \
						<div id='p_content"+_count+"' class='p _content absolute'></div>  \
					</div>     							\
				");
				$('#blackCircle'+_count).jCanvas({
					 fillStyle: '#000',
					 x: 100, y: 100,
					 radius: 100
				}).drawArc();
				
				$.ajax({
					url: 'qa_cgi/loadQAData.php',
					data: { topic: 'Nuclear', count: tmpCount, fration: 0 },
					type: "GET",
					dataType: "json",
					success: function(data){
						var obj = $.parseJSON(data);
						var summery = obj.content;
						summery = summery.substr(1,20);
						var link = "<a onclick='openAll()' class='link'>(詳全文)</a>";
						$('#p_title'+_count).html(obj.title);
						$('#p_content'+_count).html(summery+link);
					},
					error: function(xhr){
						alert("ajax error");
						console.log(xhr.status);
						console.log(ajaxOptions);
						console.log(throwError);
					}
				
				});
			
			}else if(faction == 1){
				var tmpCount = _count;
				$('#rightboard').append(" 			  \
					<div id='neg"+_count+"' class='grayBorder'>						\
						<canvas id='grayCircle"+_count+"' class='absolute' width=200px height=200px></canvas>  \
						<div id='n_title"+_count+"' class='n _title'></div>  \
						<div id='n_content"+_count+"' class='n _content '></div>  \
					</div>     							\
				");
				$('#grayCircle'+_count).jCanvas({
					 fillStyle: '#F1F2F2',
					 x: 100, y: 100,
					 radius: 100
				}).drawArc();
				
				$.ajax({
					url: 'qa_cgi/loadQAData.php',
					data: { topic: 'Nuclear', count: tmpCount, fration: 1 },
					type: "GET",
					dataType: "json",
					success: function(data){
						var summery = data.content;
						summery = summery.substr(0,9);
						var link = "<br><a onclick='openAll()' class='link'>(詳全文)</a>";
						$('#n_title'+tmpCount).append(data.title);
						$('#n_content'+tmpCount).append(summery+link);
					},
					error: function(xhr,ajaxOptions, thrownError){
						alert("ajax error");
						console.log(xhr.status);
						console.log(ajaxOptions);
						console.log(throwError);
					}
				});				
						
			}
			
			_count++;
		
		}
		return drawCircle;
	}

$(document).ready(function (){

	$('#blackTriangle').jCanvas({
		 fillStyle: 'black',
		 x: 50, y: 45,
		 radius: 55,
		 sides: 3,
		 rotate: 180
	}).drawPolygon();
	
	$('#grayTriangle').jCanvas({
		 fillStyle: '#F1F2F2',
		 x: 50, y: 70,
		 radius: 55,
		 sides: 3,
		 rotate: 0
	}).drawPolygon();
	
	$('#mask').click(function(){
	
		$('#mask').css("visibility","hidden");
		$('#all').css("visibility","hidden");
	
	});
	


	var leftCircle = circleSet();
	var rightCircle = circleSet();
	
	rightCircle(1);


});
