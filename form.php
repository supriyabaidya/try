<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Form</title>
        <style type="text/css">
            body {
                font-size: 150%
            }
            
            a:visited {color: green}
            a:hover {color: red}
        </style>
    </head>
    <body>
        <h1>Sample form page</h1>
        
        
        <form action="send_simpleform.php" method="post">
            <label>Name : </label>
            <input type="text" name="name" width="300px" height="50px"/><br/>
            <label>E-mail : </label>
            <input type="text" name="email" width="300px" height="50px"/><br/>
        </form>
        <a href="login.php?lo">log out</a><br/>
        <a href="login.php?cu">change user</a>
    </body>
</html>