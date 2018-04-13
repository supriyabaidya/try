<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>151025</title>
	</head>
	<body>
		<form action="" method="post" onsubmit="return check()">
			firstname:
			<input type="text" name="fname" id="fname" /><br/>
			lastname:
			<input type="text" name="lname" id="lname" /><br/>
			department:
			<input type="text" name="dept" id="dept" /><br/>
			<input type="submit" name="submit" value="insert"  />
		</form>
		
		<div id="info"></div>
		
		<script type="text/javascript">
			function check() {
				var fname=document.getElementById("fname").value;
				var lname=document.getElementById("lname").value;
				var fullname =fname+lname;
				var regExpString = /^([A-Za-z]*)$/g;
				if(regExpString.test(fullname))
				{
					return true;
				}
				else
				{
					document.getElementById("info").innerHTML="incorrect name";
					return false;
				}
				
			}
			
		</script>
		
		
		
		<?php
	    	
	    	$link=mysqli_connect("localhost","root","","server_db") or die ("database error");
	    	
	    	$query = "select * from user";
	    	 
	    	$result=mysqli_query($link, $query);
	    	echo "<table>
	    	<tr>
	    	<th>id</th>
	    	<th>firstname</th>
	    	<th>lastname</th>
	    	<th>department</th>
	    	</tr>";
	    	
	    	while ($rows=mysqli_fetch_row($result)) {
	    		echo "<tr>\n<th>".$rows[0]."</th>\n<th>".$rows[1]."</th>\n<th>".$rows[2]."</th>\n<th>".$rows[3]."</th></tr>";
	    	
	    	}
	    	echo "</table>";
	    	
	    	$deptExist=false;
	    	if(array_key_exists("submit", $_POST))
	    	{
	    	$fname=$_POST["fname"];
	    	$lname=$_POST["lname"];
	    	$dept=$_POST["dept"];
	    	
	    	
	    	$query = "select * from user";
	    	 
	    	$result=mysqli_query($link, $query);
	    	
	    	while ($rows=mysqli_fetch_row($result)) {
	    		
	    		if($dept==$rows[3])
	    		{
	    			$deptExist=true;
	    			break;
	    		}
	    	
	    	}
	    	
	    	
	    	if($deptExist)
	    	{
	    		
	    		@mysqli_query($link, "insert into user(firstname,lastname,department) values('".$fname."','".$lname."','".$dept."');");
	    		 
	    		echo "succeeded";
	    	}
	    	else{
	    		echo "failed";
	    	}
	    	
	    	$query = "select department,count(department) from user group by department";
	    	
	    	$result=mysqli_query($link, $query);
	    	
	    	echo "<table>
	    	<tr>
	    	<th>department</th>
	    	<th>count</th>
	    	</tr>";
	    	while ($rows=mysqli_fetch_row($result)) {
	    		echo "<tr>\n<th>".$rows[0]."</th>\n<th>".$rows[1]."</th></tr>";
	    	
	    	}
	    	echo "</table>";
	    	}
		?>
	</body>
</html>