<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="utf-8">
        <title>Downloads</title>
        <link type="text/css" href="styles/styles.css" rel="stylesheet">
        
        <style>
             a {
                text-decoration: none
            }
        </style>
    </head>
    <body>
    <script type="text/javascript">
            var time=5;
            var myInterval;
            function myTimer(file)
            {
                if(time>=0)
                    document.getElementById(file).innerHTML=" wait "+time+" seconds ";
                else
                {
                    clearInterval(myInterval);
                    time=5;
                    setTimeout(function(){
                       window.location="download_script.php?file="+file;
                       document.getElementById(file).innerHTML=file;
                    },1000);
                }
                time--;
            }
            function downladFile(file)
            {
            	document.getElementById(file).innerHTML=" downloading your file "+file;
                myInterval=setInterval(function(){myTimer(file);},1000);
            }
        </script>
        
        <h1>Downloads</h1>        
        
        <?php
    		include 'menu.html';
    	?>
        
        
        
        <p> Download list :</p>
        
        <p> this is the end of the download list</p>
        
        <address class="bottom">Supriya Baidya <a href="mailto:supriyobaidya63@gmail.com"> supriyobaidya63@gmail.com</a> <br/>
            Copyright &copy; Supriya Baidya 1995-2017 all rights reserved
        </address>
    </body>
    
</html>