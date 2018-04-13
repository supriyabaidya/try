<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>solution (PHP)</title>
	</head>
    <body>
    	<h1>Previous years (PHP) Question's solution</h1>
    	
    	<hr>
		<h3>2016</h3>
		<h4>4. a)</h4>
		
		Input filename :<br/>
		<form action="" method="post" >
			<input type="text" name="filename" />
			<input type="submit" value="submit" /><br/>
		</form>
		
		
		
	    <?php
	    
	    	$fileSubmitted=false;
	       	if (array_key_exists("filename", $_POST)) {	       		
	       		$fileSubmitted=true;
	       	}
	    	
	    	$link=mysqli_connect("localhost","root","","years_solution") or die("Could not connect to MySQL server !!!\n<br/>years_solution database is not found");
	    	
		    if(mysqli_query($link, "select * from dictionary ;")!=false)
		    {
		    	mysqli_query($link, "truncate dictionary ;");
		    	echo "'dictionary' table exists, so truncated it.";
		    }
		    else
		    {
		    	mysqli_query($link, "create table dictionary(word varchar(30) primary key,frequency int) ;");
		    	echo "'dictionary' table doesn't exist, so created it.";
		    }
		    
		    
		    if($fileSubmitted)
		    {
		    	if(file_exists($_POST["filename"]))
		    	{
		    		echo "\n<br/>You entered the filename => '".$_POST["filename"]."' exists.\n<br/>";
		    	
			    	$myfile = fopen($_POST["filename"],"r");
			    	
				    while (!feof($myfile))
				    {
				    	$word=rtrim(strtolower(fgets($myfile)));			// rtrim to clean unwanted characters from the end of the string
				    	
				    	$temp=explode(" ", $word);
				    	
				    	$tempSize=sizeof($temp);
				    	
				    	for ($i=0;$i<$tempSize;$i++)
				    	{
				    		$wordCount=0;
				    		$tempResult=mysqli_query($link, "select word from dictionary where word='".$temp[$i]."';");
				    		if(mysqli_num_rows($tempResult)==0)
				    		{
				    			@mysqli_query($link, "insert into dictionary(word,frequency) values('".$temp[$i]."',1);");
				    		}
				    		else
				    		{
		// 		    			$wordCount=mysqli_fetch_row(mysqli_query($link, "select frequency from dictionary where word='".$temp[$i]."';"))[0];
				    			$wordCountArray=mysqli_fetch_row(mysqli_query($link, "select frequency from dictionary where word='".$temp[$i]."';"));
				    			$wordCount=$wordCountArray[0];
				    			$wordCount++;
				    			@mysqli_query($link, "update dictionary set frequency=".$wordCount." where word ='".$temp[$i]."';");
				    		}
				    		
				    	}
				    	
				    	
				    	if(strlen($word)>=5 && ctype_alpha($word))
				    		@mysqli_query($link, "insert into word(word) values('".$word."');");
				    }
				    
				    fclose($myfile);
				    
				    echo "<br/><table style=\"border:5px solid blue\">\n<tr>\n<th style=\"text-align : left\">Word</th>\n<th style=\"text-align : left\">Frequency</th>\n</tr>";
				    $result=mysqli_query($link,"select * from dictionary;");
				    while ($rows=mysqli_fetch_row($result))
				    {
				    	echo "<tr>\n<td>".$rows[0]."</td>\n<td>".$rows[1]."</td>\n</tr>\n";
				    }
				    echo "<br/></table>";
				    
		    	}
		    	else
		    		echo "\n<br/>You entered the filename => '".$_POST["filename"]."'  doesn't exist.\n<br/>";
		    }
		?>
		
		<hr>
		<h3>2015</h3>
		<h4>4. a)</h4>
		
		<h3>The table :</h3>
		
		<table style="border: 2px solid blue" >
		
		
		<?php
			
			$result=mysqli_query($link, "select * from products");
			
			echo "<tr>\n";
			while ($headerRow=mysqli_fetch_field($result))
			{
				echo "<th>".$headerRow->name."</th>\n";
			}
			echo "</tr>\n";
			
			$numRows=mysqli_num_rows(mysqli_query($link, "select * from products"));
			
			$result=mysqli_query($link, "select * from products");
			
			
			for($i=0;$i<$numRows;$i++)
			{
				$row=mysqli_fetch_row($result);
				echo "<tr>\n";
				for($j=0;$j<sizeof($row);$j++)
				{
					echo "<td>".$row[$j]."</td>\n";
				}
				echo "</tr>\n";
			}
			
		?>
		
		</table>
		
		
		<hr>
		<h3>2014</h3>
		<h4>1. a)</h4>
		
		<?php
			$word="text";
			$i=0;
			$charArray=array();
			while ($i<strlen($word))
			{
				array_push($charArray,substr($word, $i,1));
				$i++;
			}
			echo $word."<br/>";
			echo "the word '".$word."' is splited into characters as follows :<br/>";
			print_r($charArray);
		?>
		
		
		<hr>
		<h3>2014</h3>
		<h4>1. c)</h4>
		
		Input string :<br/>
		<form action="" method="post" >
			<input type="text" name="string" />
			<input type="submit" value="submit" /><br/>
		</form>
		
		Output :<br/>
		
		<?php
			if (array_key_exists("string", $_POST))
			{
				if(preg_match_all("/^[A-Za-z]*$/", $_POST["string"]))
				{
					if (preg_match("/^[A-Z]/", $_POST["string"]))
					{
						$_POST["string"]=strtolower($_POST["string"]);
					}
					echo $_POST["string"];
				}
			}
		?>
		
		
		<hr>
		<h3>2014</h3>
		<h4>2. b)</h4>
		
		<p>SAME AS 2015 4. a)</p>
		
		<hr>
		<h3>2014</h3>
		<h4>2. c)</h4>
		
		Input few words :<br/>
		<form action="" method="post" >
			<textarea name="few_words" style="resize:none; width: 200px ; height: 100px"  ></textarea><br/>
			<input type="submit" value="submit" /><br/>
		</form>
		
		Output :<br/>
		
		<?php
		
			if (array_key_exists("few_words", $_POST)) {
				$words=explode(" ", $_POST["few_words"]);
				
				$temp=sizeof($words);
				for ($i=0;$i<$temp;$i++)
				{
// 					if(preg_match_all("/.*(a|A|e|E|i|I|o|O|u|U).+(a|A|e|E|i|I|o|O|u|U).*/", $words[$i]))
// 						echo $words[$i]."<br/>";
					if(preg_match_all("/.*[aAeEiIoOuU].+[aAeEiIoOuU].*/", $words[$i]))
						echo $words[$i]."<br/>";
// 					if (preg_match_all("/[abc]/", $words[$i]))
// 						echo $words[$i]."<br/>";
				}
// 				echo $_POST["few_words"];
				
// 				print_r($words);
			}
		?>
		
    </body>
</html>