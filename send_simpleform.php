<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
        <title>response</title>
        <link type="text/css" href="styles/styles.css" rel="stylesheet">
    </head>
    <body>
    	<h1>A simple response</h1>
    	<?php
    		include 'menu.html';
    	?>
        <p>Welcome, <strong><?php echo $_REQUEST['user']; ?></strong>!</p>
        <p>Your message is:<strong><?php echo $_REQUEST['message']; ?></strong></p>
    </body>
</html>