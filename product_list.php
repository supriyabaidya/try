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
		<meta charset="utf-8">
		<title>Online Shopping</title>
		<link href="styles/styles.css" type="text/css" rel="stylesheet" />
	</head>
    <body>
    	<h1>Online Shopping</h1>
    	
    	<?php
    		include 'menu.html';
    		include 'database.php';
    		
    		if ($_SERVER['QUERY_STRING']!=null)
    		{
    			
    			$query = "select * from products where productid = '".$_SERVER['QUERY_STRING']."'";
    			
    			$result=mysqli_query($link, $query);
    			
    			$num_rows=mysqli_num_rows($result);
    			
    			if ($num_rows==1)
    			{
    				if(!isset($_SESSION[$_SERVER['QUERY_STRING']]))
    					$_SESSION[$_SERVER['QUERY_STRING']]=0;
    				foreach ($_SESSION as $pid => $count)
    				{
	    				if(array_key_exists($pid, $_POST))
	    				{		    					
		    				$_SESSION[$_SERVER['QUERY_STRING']]=$_SESSION[$_SERVER['QUERY_STRING']]+1;
		    				
		    				header("location:product_list.php?".$_SERVER['QUERY_STRING']);
		    				
		    				break;
	    				}
    				}
    					
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
    				
    				
    				echo "<h3>added to cart successfully .</h3>";
    				echo "<pre>Subtotal (".$total_items." ".$item.") : ".$total_cost."	||	<a href=\"checkout.php\" >Proceed to checkout (".$total_items." ".$item.")</a></pre>";
    				

    			}
    			
    		}
    	?>
    	
    	<a href="cart.php" >cart</a>
    	
    	<h2>List of products</h2>
    	
    	<ol>
            
            <?php
            	
	            $query = "select * from products";
	            
	            $result=mysqli_query($link, $query);
            
            	while ($rows=mysqli_fetch_row($result)) {
            		echo "<li><a href=\"product.php?".$rows[0]."\">".$rows[1]."</a></li><br/>";
            		
            	}
            	
            	
            	mysqli_close($link);
            ?>
            
        </ol>
	    
    </body>
</html>