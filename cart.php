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
		<title>cart</title>
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
		<h1>Cart</h1>
		
		<?php
    		include 'menu.html';
    		include 'database.php';
    		
    		
    		
    		foreach ($_SESSION as $pid => $count)
    		{

				if(array_key_exists($pid."add", $_POST))
				{
					$_SESSION[$pid]=$_SESSION[$pid]+1;
					break;
				}
				else if(array_key_exists($pid."sub", $_POST))
				{
					if($count>0)
						$_SESSION[$pid]=$_SESSION[$pid]-1;
					break;
				}
    			
    		}
    		
    		$flag=null;
    		
    		echo "<form action=\"cart.php?prevent_resub\" method=\"post\">\n";
    		
    		echo "<label >Cart</label><table>\n";
    		echo "<tr>\n";
    		echo "<th>Product Name</th>\n";
    		echo "<th>Quantity</th>\n";
    		echo "<th>Unit Price</th>\n";
    		echo "<th>Cost</th>\n";
    		echo "<th>Increase<br/>Qty</th>\n";
    		echo "<th>Decrease<br/>Qty</th>\n";
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
    				echo "<td><input type=\"submit\" name=\"".$pid."add\" value=\"+\" /></td>\n";
    				echo "<td><input type=\"submit\" name=\"".$pid."sub\" value=\"-\" /></td>\n";
    				
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
    			echo "<h3>Subtotal (".$total_items." ".$item.") : ".$total_cost." </h3>\n";
    			echo "<a href=\"checkout.php\" >Checkout (".$total_items." ".$item.")</a><br/>\n";
    		}
    		
    		
    		echo "<input type=\"submit\" formaction=\"product_list.php\" value=\"GoTo 'Online Shopping' page\"/>\n";
    		echo "</form>\n";
    		
    		if ($_SERVER['QUERY_STRING']!=null) {
    			header('location:cart.php');
    			exit;
    		}
    		
    		mysqli_close($link);
    		
    		
    	?>
		
    </body>
</html>