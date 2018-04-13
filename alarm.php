<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Alarm</title>
<link type="text/css" rel="stylesheet" href="styles/styles.css" >
		<style type="text/css">
			
		</style>
</head>
<body onload="setInterval('displaySystemTime()',500)">
    
    <h1>Alarm</h1>
    
    <?php
    	include 'menu.html';
    ?>
    
<h2>Current Time</h2>
    
<h3 id="currentTime"></h3>
    
<h4>Input your time</h4>

<input type="number" name="hours" value="" id="hours" style="width: 30px; height: 20px"/>
<input type="number" name="minutes" value="" id="minutes" style="width: 30px; height: 20px"/>
<input type="number" name="seconds" value="" id="seconds" style="width: 30px; height: 20px"/>

<script type="text/javascript">

var colors = ["red" , "green" ];
var index=0,counter =0;
	
	function displaySystemTime () {
		var currentDate = new Date();
		var element =document.getElementById("currentTime");
		
		element.innerHTML = " "+currentDate.getHours() + " : " + currentDate.getMinutes() + " : " + currentDate.getSeconds();
		
		var h = document.getElementById("hours").value;
		var m = document.getElementById("minutes").value;
		var s = document.getElementById("seconds").value;
		 
		
		if(currentDate.getHours()==h && currentDate.getMinutes()==m && currentDate.getSeconds()==s)
		{
			counter++;
			if(counter==1)
			{
				if(index==0)
					index=1;
				else
					index=0;
					
				element.style.color = colors[index];
			}
		}
		else
			counter =0;
	}
	
</script>
</body>
</html>