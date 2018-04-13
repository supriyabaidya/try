<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Product</title>
		<link href="styles/styles.css" type="text/css" rel="stylesheet" />
	</head>
    <body>
    	
	    <h1>Product</h1>
	    
	    <?php
	    	include 'menu.html';
	    	include 'database.php';
		?>
        
        <a href="cart.php" >cart</a><br/><br/>
		
		
		<?php
				
			$query = "select * from products where productid ='".$_SERVER['QUERY_STRING']."'";
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_row($result);
			
			
			echo "<img src=\"products/".$row[2]."\" alt=\"No image found .\" />";
			echo "<h4>".$row[1]."</h4>";
			echo "<h5> price : ".$row[3]."</h5>";
			echo "<p> Description : ".$row[4]."</p>";
			
			echo "<form action=\"product_list.php?".$_SERVER['QUERY_STRING']."\" method=\"post\">\n";
			echo "<input type=\"submit\" name=\"".$_SERVER['QUERY_STRING']."\" value=\"add to cart\"/>\n";
			echo "<input type=\"submit\" formaction=\"product_list.php\" value=\"GoTo 'Online Shopping' page\"/>\n";
			echo "</form>";
		?>
		
		
    </body>
</html>