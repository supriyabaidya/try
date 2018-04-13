<?php
session_id("total-hits-counter");
session_name("TOTAL-HITS");
session_start();

if (!isset($_SESSION['counter']))
    $_SESSION['counter'] = 0;

$_SESSION['counter'] = $_SESSION['counter'] + 1;
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link type="text/css" href="styles/styles.css" rel="stylesheet" />

    </head>
    <body>


        <h1>Home</h1>

        <?php
        include 'menu.html';
        echo "<p>Hits : " . $_SESSION['counter'] . " times.</p>";

        echo "<h4>in</h4>";
        print("php<br/>");
        echo "echo comes when 'e' is typed<br/> and double quote comes when \" is typed in ";

//             phpinfo();
        ?>

        <h2>PHP<br/>Well actually eclipse is good,I can deploy and test php from eclipse</h2>

        <h3>It's inside of the neon folder</h3>

        <p> It can show live preview </p>

        <p> I like it </p>
        <p> now I'm live editing,but it is not shown as I am typing </p>
        <p> now  I can , by enabling experimental live preview fgfgfhg fgfgfg fgfgf gf ghghgf</p>
        <p > test fsf ghhgfhfgh fjfjhfj vdvdddg sfsfs</p>

        <p> It can show live preview </p>

        <p> I like it </p>
        <p> now I'm live editing,but it is not shown as I am typing </p>
        <p> now  I can , by enabling experimental live preview fgfgfhg fgfgfg fgfgf gf ghghgf</p>
        <p > test fsf ghhgfhfgh fjfjhfj vdvdddg sfsfs</p>
        <p> It can show live preview </p>

        <p id="tryp2"> I like it </p>
        <p> now I'm live editing,but it is not shown as I am typing </p>
        <p> now  I can , by enabling experimental live preview fgfgfhg fgfgfg fgfgf gf ghghgf</p>
        <p > test fsf ghhgfhfgh fjfjhfj vdvdddg sfsfs</p>
        <p> It can show live preview </p>

        <p> I like it </p>
        <p> now I'm live editing,but it is not shown as I am typing </p>
        <p> now  I can , by enabling experimental live preview fgfgfhg fgfgfg fgfgf gf ghghgf</p>
        <p > test fsf ghhgfhfgh fjfjhfj vdvdddg sfsfs</p>
        <p> It can show live preview </p>

        <p> I like it </p>
        <p> now I'm live editing,but it is not shown as I am typing </p>
        <p> now  I can , by enabling experimental live preview fgfgfhg fgfgfg fgfgf gf ghghgf</p>
        <p > test fsf ghhgfhfgh fjfjhfj vdvdddg sfsfs</p>
        <p> It can show live preview </p>

        <p id="tryp"> I like it </p>
        <p> now I'm live editing,but it is not shown as I am typing </p>
        <p> now  I can , by enabling experimental live preview fgfgfhg fgfgfg fgfgf gf ghghgf</p>


        <p > test fsf ghhgfhfgh fjfjhfj vdvdddg sfsfs</p>

        <address class="bottom">Supriya Baidya <a href="mailto:supriyobaidya63@gmail.com"> supriyobaidya63@gmail.com</a> <br/>
            Copyright &copy; Supriya Baidya 1995-2017 all rights reserved
        </address>

    </body>

</html>