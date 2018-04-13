<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Log In</title>
        <link href="styles/styles.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
    
    <h1>Log in page</h1>
    
    <?php
    	include 'menu.html';
    ?>
    
    <?php
	    $err_msg=null;
	    if ($_SERVER['QUERY_STRING'] !== null)
	    {
	    	if ($_SERVER['QUERY_STRING'] === 'lo')
	    	{
	    		setcookie("login[password]","",time()-3600);
	    		
	    		header('Location:login.php');
	    		exit;
	    	}
	    	else if ($_SERVER['QUERY_STRING'] === 'cu')
	    	{
	    		setcookie("login[username]","",time()-3600);
	    		setcookie("login[password]","",time()-3600);
	    		
	    		header('Location:login.php');
	    		exit;
	    	}
	    	else
	    	{
	    		$err_msg="Invalid username or password";
	    	}
	    }
	    	
	    	
	    if (isset($_COOKIE['login']['username']) && isset($_COOKIE['login']['password'])) {
	    	header('Location:form.php');
	    }
    ?>
        <h2>Please log in</h2>
        
        <?php
        	if ($err_msg!=null) {
        		echo "<h3>".$err_msg."</h3>";
        	}
        ?>
        <form action="setme.php" method="post">

            <label>username : </label>
            <input type="text" name="username" width="300px" height="50px"
            value="<?php
            if (isset($_COOKIE['login']['username'])) {
            	echo $_COOKIE['login']['username'];
            } 
            ?>" /><br/>
            <label>password : </label>
            <input type="password" name="password" width="300px" height="50px"/><br/>
            <input type="checkbox" name="chkremember" value="remember">remember me<br/>
            <input type="submit" value="Login">            
        </form>
    </body>
</html>