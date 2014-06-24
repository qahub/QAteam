	function openSet(_topic){

		function openAll(_id){
		
			$('#allmask').css("visibility","visible");
			$('#all').css("visibility","visible");

			$.ajax({

				url: 'qa_cgi/loadQADataAll.php',
				data: { id : _id ,topic : _topic},
				type: "GET",
				dataType: "json",
				success: function(data){

					$('#contentA').append(data.content);
					$('#contentQ').append(data.contentQ);

				},
				error: function(xhr){
					alert("ajax error");
					console.log(xhr.status);
				}
		
			});	
		
		}
		return openAll;

	}

	function circleSet(){

		var _count = 0;
		function drawCircle(_topic, faction){
			if(faction == 2){
				var tmpCount = _count;
				$('#leftboard').append(" 			  \
					<div id='pos"+_count+"' class='blackBorder'>						\
						<canvas id='blackCircle"+_count+"' class='absolute' width=300px height=200px></canvas>  \
						<div id='p_title"+_count+"' class='p _title absolute'></div>  \
						<div id='p_content"+_count+"' class='p _content absolute'></div>  \
					</div>     							\
				");
				$('#blackCircle'+_count).jCanvas({
					 fillStyle: '#000',
					 x: 125, y: 75,
					 width: 250,
					 height: 150,
					 cornerRadius: 10
				}).drawRect();
				
				$.ajax({
					url: 'qa_cgi/loadQAData.php',
					data: { topic: _topic, count: tmpCount, fration: 2 },
					type: "GET",
					dataType: "json",
					success: function(data){
						var summery = data.content;
						summery = summery.substr(0,9);
						var link = "...<br><a onclick='openAll("+data.id+")' class='link'>(詳全文)</a>";
						$('#p_title'+tmpCount).append(data.title);
						$('#p_content'+tmpCount).append(summery+link);

					},
					error: function(xhr){
						alert("ajax error");
						console.log(xhr.status);
					}
				
				});
			
			}else if(faction == 1){
				var tmpCount = _count;
				$('#rightboard').append(" 			  \
					<div id='neg"+_count+"' class='grayBorder'>						\
						<canvas id='grayCircle"+_count+"' class='absolute' width=300px height=300px></canvas>  \
						<div id='n_title"+_count+"' class='n _title'></div>  \
						<div id='n_content"+_count+"' class='n _content '></div>  \
					</div>     							\
				");
				$('#grayCircle'+_count).jCanvas({
					 fillStyle: '#F1F2F2',
					 x: 125, y: 75,
					 width: 250,
					 height: 150,
					 cornerRadius: 10
				}).drawRect();
				
				$.ajax({
					url: 'qa_cgi/loadQAData.php',
					data: { topic: _topic, count: tmpCount, fration: 1 },
					type: "GET",
					dataType: "json",
					success: function(data){
						var summery = data.content;
						summery = summery.substr(0,9);
						var link = "...<br><a onclick='openAll("+data.id+")' class='link'>(詳全文)</a>";
						$('#n_title'+tmpCount).append(data.title);
						$('#n_content'+tmpCount).append(summery+link);
					},
					error: function(xhr,ajaxOptions, thrownError){
						alert("ajax error");
						console.log(xhr.status);
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
	
	$('#allmask').click(function(){
	
		$('#allmask').css("visibility","hidden");
		$('#all').css("visibility","hidden");
		$('#allTitle').html("");
		$('#allContent').html("");
	
	});
	
});
