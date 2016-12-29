<?php
/* @var $this yii\web\View */
?>
<h1>circle-show/index</h1>
<p>
	You may change the content of this page by modifying the file
	<code><?= __FILE__; ?></code>
	.
	<canvas id="myCanvas" width="500px" height="500px"></canvas>
	<script>
    	var circles = <?= json_encode($circles, JSON_UNESCAPED_UNICODE, 2)?>;
      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');

      	function checkIfInsideButtonCoordinates(b, x1, y1)
				{
      			inside = Math.sqrt((x1-b.x)*(x1-b.x) + (y1-b.y)*(y1-b.y)) < b.radius
				    if(inside)
				        return true;
				    else
				        return false;
				}

			function drawCircle (e) {
				console.log(e);
			      var centerX = e;
			      var centerY = canvas.height / 2;
			      var radius = 70;

			      context.beginPath();
			      context.arc(e.x, e.y, e.radius, 0, 2 * Math.PI, false);
			      context.fillStyle = ['red','blue','green','yellow'][ e.color % 4];
			      context.fill();
			      context.lineWidth = 2;
			      context.strokeStyle = '#003300';
			      context.stroke();
			}

		  circles.forEach(drawCircle);

      canvas.addEventListener("mousedown", (function(e) {
    	    mouseX = e.pageX - this.offsetLeft;
    	    mouseY = e.pageY - this.offsetTop;
					console.log(e, [mouseX, mouseY]);
    	    circles.forEach(function(e){
	    	    if(checkIfInsideButtonCoordinates(e, mouseX, mouseY))
	    	    {
	    	        alert(e.message);
	    	        e.color = 1 + parseInt(e.color);
	    	        drawCircle(e);

	    	    }
    	    });
    	}));


    </script>
</p>
