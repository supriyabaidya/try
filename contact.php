<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="utf-8">
        <title>Contact</title>
        <link type="text/css" href="styles/styles.css" rel="stylesheet">
    </head>
    <body>
        
        <h1>Contact</h1>
        
        <?php
    		include 'menu.html';
            include 'database.php';
    	?>
        
<!--
        <h2>It's better than eclipse or aptana or combined</h2>
        
        <h3>It's inside of the brackets folder</h3>
-->
        
        <h4>Phone No.</h4>
        
        <p> 9051568624</p><br/>
        <h5>Leave a Comment</h5>
        
        <form action="comment.php" method="post">
            <textarea name="comment" style="resize : none ; width:300px ; height:100px" ></textarea><br/>
            <input type="submit" value="comment" />
        </form>
        
        <h5>Comments</h5>
        
        <hr size="2" >
        	
        <?php
            	
	            $query = "select * from visitors";
	            
	            $result=mysqli_query($link, $query);
            
            	while ($rows=mysqli_fetch_row($result)) {
                    echo "<p>".$rows[0]."</p>\n<pre>".$rows[8]."</pre>\n<hr size=\"2\" >";            		
            	}
            	
            	
            	mysqli_close($link);
        ?>
			
		
		<p> end</p>
        
        
        <address class="bottom">Supriya Baidya <a href="mailto:supriyobaidya63@gmail.com"> supriyobaidya63@gmail.com</a> <br/>
            Copyright &copy; Supriya Baidya 1995-2017 all rights reserved
        </address>
    </body>
    
</html>