<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>A simple HTML form</title>
        <link type="text/css" href="styles/styles.css" rel="stylesheet" />
    </head>
    <body>
    
    	<h1>Message</h1>
    	
    	<?php
    		include 'menu.html';
    	?>
    	
        <form method="post" action="send_simpleform.php">
            <p><label for="user">Name:</label><br/>
            <input type="text" id="user" name="user"></p>
            <p><label for="message">Message:</label><br/>
            <textarea id="message" name="message" rows="5" cols="40"></textarea></p>
            <button type="submit" name="submit" value="send">Send Message</button>
        </form>
    </body>
</html>