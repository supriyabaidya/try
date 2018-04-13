<?php
 session_id("value1234");
 session_name("postvariablestore");
 session_start();
 ?>
<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="utf-8">
        <title>Practice PHP</title>
        <link type="text/css" href="styles/styles.css" rel="stylesheet">

    </head>
    <body>
    
        <h1>First HTML code with Brackets </h1>
        
        <?php
    		include 'menu.html';
        
            $user="root";
            $pwd="";
            $db="mysql";
            
//             $str=array();
//             array

            $link=mysqli_connect('localhost',$user,$pwd) or die("Could not connect to MySQL server !!!");

            @mysqli_select_db($link, $db) or die("'".$db."' database is not found");
    	?>
    	
    	<hr>
    	<p>File upload</p>
    	<h5 >Max upload size is 10MB .</h5>
    	<form action="upload_script.php" method="post" enctype="multipart/form-data" >
	    	<input type="file" name="fileToUpload" /><br/>
	    	<input type="submit" value="upload" />
    	</form>
	    
        <h5> upload status : 
        	<?php
	    		if (isset($_SESSION['message']))
	    		{
	    			echo $_SESSION['message'];
	    			unset($_SESSION['message']);
	    		}
    		?>
    	</h5>
    	
    	<hr>
        
        <table>
    	<tr>
    		<th>Host</th>
    	</tr>
	    <?php
	    
	    	$result=mysqli_query($link,"select Host from user;");
	    	while ($rows=mysqli_fetch_row($result))
	    	{
	    		echo "<tr>\n<td>".$rows[0]."</td>\n</tr>\n";
	    	}
	    	
		?>
	</table>
        
    <hr>
        
        <pre style="width: 500px;font: 30px " >1st</pre><label style="width:1000px" >dhtdhtdh</label><pre style="width: 500px" >2nd</pre>
        <label style="width:1000px" >dhtdhtdh</label>
        <input type="text" value="trtrt" style="width: 50px" >
        
        <p id="anchorTest">This is an anchor test .</p>
        
        <h3>setcookie("temp","value",86400)  is similar to $_COOKIE["temp"]="value" , with one exception , that $_COOKIE["temp"] can not be accessed before setcookie("temp","")</h3>
        
        <table style="background-color: white">
        		<tr>
        			<th>header1</th>
        			<th>header2</th>
        			<th>header3</th>
        		</tr>
        		<tr>
        			<td>0</td>
        			<td>10</td>
        			<td>20</td>
        		</tr>
        		<tr>
        			<td>0</td>
        			<td>10</td>
        			<td>20</td>
        		</tr>
        		<tr>
        			<td>00</td>
        			<td>100</td>
        			<td>200</td>
        		</tr>
        		<tr>
        			<td>000</td>
        			<td>1000</td>
        			<td>2000</td>
        		</tr>
        		<tr>
        			<td>0000</td>
        			<td>1000000000000000</td>
        			<td>20000</td>
        		</tr>
        		<tr>
        			<td>00000</td>
        			<td>100000</td>
        			<td>200000000000000000000</td>
        		</tr>
        </table>
        
        <h2>It's better than eclipse or aptana or combined</h2>
        
        <h3>It's inside of the brackets folder</h3>
        
        <h4>Practicing and implementing and testing examples.</h4>
        
        <?php
        	echo "<h5> Addition test </br></br>Start</h5>";
	    	$a=5;
	    	$b=4;
	    	$total_items=$a+$b;
	    	echo "<p> sum is ".$total_items." </p>";
	    	echo $total_items;
	    	echo "<h5>End of Addition test </h5>";
	    	
	    	
	    	/* file handling */
	    	
	    	$myfile = fopen("test.txt","r");
	    	
	    	echo fread($myfile,filesize("test.txt"));
	    	echo "<br/>";
	    	
	    	fclose($myfile);
	    	
	    	$myfile = fopen("test.txt","r");
	    	
	    	while (!feof($myfile)) {
	    		echo fgets($myfile) . "   ...   reading single line <br/>";
	    	}
	    	
	    	echo "<br/>";
	    	
	    	fclose($myfile);
	    	
	    	$myfile = fopen("test.txt","r");
	    	
	    	while (!feof($myfile)) {
	    		echo fgetc($myfile) . "   ...   reading single Char <br/>";
	    	}
	    	
	    	echo "<br/>";
	    	
	    	fclose($myfile);
	    	
	    	$myfile = fopen("test.txt","r");
	    	$word="";
	    	while (!feof($myfile)) {
	    		$char=fgetc($myfile);
	    		$word=$word.$char;
	    		if($char==" " || $char=="," || $char==".")
	    		{
	    			echo $word."   ...   reading single word <br/>";
	    			$word="";
	    		}
	    		
	    	}
	    	
	    	echo "<br/>";
	    	
	    	fclose($myfile);
	    	
	    	$myfile = fopen("new.txt","w");
	    	
	    	
	    	fwrite($myfile," 1st  ...   writing to a file \n");
	    	fwrite($myfile," 2nd  ...   writing to a file \n");
	    	
	    	echo "<br/>";
	    	
	    	fclose($myfile);
	    	
	    	
	    	$myfile = fopen("new.txt","a");
	    	
	    	
	    	fwrite($myfile," 3st  ...   appending to a file \n");
	    	fwrite($myfile," 4nd  ...   appending to a file \n");
	    	
	    	echo "<br/>";
	    	
	    	fclose($myfile);
	    	
		?>
		
		
        
        <p> It can show live preview <br/>        
            I like it <br/>
            Now I'm live editing by enabling experimental live preview
        </p>
        
        <a href="login.php">Login test<br/><br/><br/></a>
        
        
        <div class="me">
            <a href="images/me.jpg" id="previous">Previous</a>
            <a href="images/me.jpg" id="next">Next</a>
            <img src="images/me2.jpg" alt="ME NOW"/>
            
            <div class="note1">
                <img src="images/me3.jpg" alt="ME OLD" />
                Me
            </div>
        </div>
        
        <h1>Testing</h1>
        
        <hr width="100%" size="4" />
        
        <h2>List testing ...</h2>
        
        <ol>
            <li> default ordered list 1</li>
            <li> default ordered list 2</li>
        </ol>
        
        <ol style="list-style-type: decimal;" start="30">
            <li> ordered list decimal 1</li>
            <li> ordered list decimal 2</li>
        </ol>
        
        <ol style="list-style-type: lower-roman;" start="30">
            <li> ordered list lower-roman 1</li>
            <li> ordered list lower-roman 2</li>
        </ol>
        
        
        <ul>
            <li> default unordered list 1</li>
            <li> default unordered list 2</li>
        </ul>
        
        <ul style="list-style-type: circle;">
            <li> unordered list circle 1</li>
            <li> unordered list circle 2</li>
        </ul>
        
         <ul style="list-style-type: upper-alpha;">
            <li> unordered list 1</li>
            <li> unordered list 2</li>
        </ul>
        
        <ul style="list-style-image: url(images/bullet.png);" >
            <li> unordered list image 1</li>
            <li> unordered list image 2</li>
        </ul>
        
        
        <dl id="trydl">
            <dt>dt 1</dt>
            <dd> dd 1</dd>
            <dd> dd 2</dd>
            <dd> dd 3</dd>
            
            <dt>dt 2</dt>
            <dd> dd 1</dd>
            <dd> dd 2</dd>
            <dd> dd 3</dd>
            
            <dt>dt 3</dt>
            <dd> dd 1</dd>
            <dd> dd 2</dd>
            <dd> dd 3</dd>
            <dd> dd 4 <a href="#anchorTest"> <em>goto anchor test secion (This is an anchor test)</em></a></dd>
        </dl>
        
        <hr size="2"/>
        
        <h2>Text formatting ...</h2>
        
        <p> <em>emphasized</em><br/>
            <strong>strong</strong><br/>
            <code>#include &lt;stdio.h&gt;</code><br/>
            Sample text with samp , a testing URL : <samp>https://www.facebook.com/</samp><br/>
            Sample text with kbd <kbd>find . -name "prune" - print</kbd><br/>
            <code>chown</code><var>your_file_name</var><br/>
            Sample text with dfn <dfn> it is dfn</dfn><br/>
            Sample text with cite <cite> it is cite</cite><br/>
            Sample text with abbr <abbr> CA</abbr> is abbreviation for <var>"whatever you want to put here"</var>
        </p>
        
        
        <p> <b>Sample text with span <span style="text-decoration: underline">underline inside</span> outside</b><br/>
            <b>Sample text with span <span style="font-family: fantasy ; font-size: 20px ; font-style: italic ; font-variant: small-caps ; font-weight: lighter ">Sample inside</span> outside</b><br/>
        </p>
        
        <pre> preformatted                   text       test          </pre>
        
        
        
        
        
        
        <blockquote>Sample text with blockquote<br/>
                    <q> dfhgh dhdghgh </q>
        </blockquote>
        
        <p> Sample text with quotes tag (q tags) <q>inside text</q> outside <br/>
            Sample text with quotes tag (q tags) with cite tags <cite>inside test</cite> outside <br/>
            Albert said "<q cite="https://google.co.in">nothing is happening</q>" can't understand the usage , - -   > > ???"
        </p>
        
        
<!--
        <script type="text/javascript">
            document.write("sgfdgdf r sg fg fgfg fbfbg");
            function fgdfg(){
                
            }
        </script>
-->
        
        <address class="bottom">Supriya Baidya <a href="mailto:supriyobaidya63@gmail.com"> supriyobaidya63@gmail.com</a> <br/>
            Copyright &copy; Supriya Baidya 1995-2017 all rights reserved
        </address>
    </body>
    
</html>