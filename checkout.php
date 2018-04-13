<?php
	$session_name="CART-SESSID";
	$session_id="SB-products";
	session_name($session_name);
	session_id($session_id);
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" >
		<title>checkout</title>
		<link href="styles/styles.css" type="text/css" rel="stylesheet" />
		
		<style type="text/css">
        	table {
         	border:5px solid green;
          	padding: 1px;
         	border-spacing: 1px
        	}
         	td,th {
         	text-align : left ;
         	border:1px solid black;
         	padding: 5px;
         	}
        </style>
	</head>
    <body>
	    <h1>Checkout</h1>
	    <?php
    		include 'menu.html';
    		include 'database.php';
    		
    		$flag=null;
    		
    		echo "<h2>Order summary</h2>\n<label >Bill</label><table>\n";
    		echo "<tr>\n";
    		echo "<th>Product Name</th>\n";
    		echo "<th>Quantity</th>\n";
    		echo "<th>Unit Price</th>\n";
    		echo "<th>Cost</th>\n";
    		echo "</tr>\n";
    		foreach ($_SESSION as $pid => $count)
    		{
    			
    			if($count>0)
    			{
    				echo "<tr>\n";
    				$query="select * from products where productid ='".$pid."'";
    				$result=mysqli_query($link, $query);
    				
    				$row=mysqli_fetch_row($result);
    				
    				echo "<td>".$row[1]."</td>\n";
    				echo "<td>".$count."</td>\n";
    				echo "<td>".$row[3]."</td>\n";
    				echo "<td>".$row[3]*$count."</td>\n";    				
    				echo "</tr>\n";
    			}
    			else
    				$flag=$flag+1;
    			
    		}
    		echo "</table>";
    		
    		if($flag==sizeof($_SESSION))
    			echo "<p>Your cart is empty.</p>\n";
    		
    		$total_items=0;
    		$total_cost=0;
    		foreach ($_SESSION as $pid => $count)
    		{
    			$total_items=$total_items+$count;
    			$query = "select * from products where productid = '".$pid."'";
    			$result=mysqli_query($link, $query);
    			$row = mysqli_fetch_row($result);
    			$total_cost=$total_cost+$row[3]*$count;
    		}
    		
    		
    		$item=null;
    		if($total_items==1)
    			$item="item";
    		else
    			$item="items";
    				
    		if ($total_items>0)
    		{
    			echo "<h3>Order total (".$total_items." ".$item.") : ".$total_cost." </h3>\n";
    			echo "<p>Thanks for shoppping with us .</p>";
    		}
    		
    		
    		
    		
    		echo "<form action=\"product_list.php\">\n";
    		echo "<input type=\"submit\" value=\"GoTo 'Online Shopping' page\"/>\n";
    		echo "</form>\n";
    		
    		foreach ($_SESSION as $name => $value)
    			unset($_SESSION[$name]);
    		
    		mysqli_close($link);
    		
    	?>
	    
    </body>
</html>