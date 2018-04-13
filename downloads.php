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
                       window.location="download_script.php?file=downloads/"+file;
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
        
        <p>A little effort to make a game , written in java , for Graphics lab assignment purpose . The game  can be downloaded from <a href="https://www.mediafire.com/file/16hljsdydrj9ci5/shankar.jar" > here </a> . after download , double click on it or run this command in windows command prompt <br/>
        <code>java -jar</code> <var>[path]/shankar.jar</var> <br/> (N.B :  use [Shitf+ Right click -> open command window here] ,to open windows command prompt in that folder where the game is )</p>
        
        <a id="CompleteWebsite.zip" onclick="downladFile('CompleteWebsite.zip')" > CompleteWebsite.zip </a> Note : For password,please contact via mail or phone . <br/>
        <a id="Assignments.zip" onclick="downladFile('Assignments.zip')" > Assignments.zip </a> Note : For password,please contact via mail or phone . <br/>
        
        <p> this is the end of the download list</p>
        
        <address class="bottom">Supriya Baidya <a href="mailto:supriyobaidya63@gmail.com"> supriyobaidya63@gmail.com</a> <br/>
            Copyright &copy; Supriya Baidya 1995-2017 all rights reserved
        </address>
    </body>
    
</html>