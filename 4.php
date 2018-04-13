<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Assignments</title>
		<link href="styles/styles.css" type="text/css" rel="stylesheet" />
	</head>
    <body>
    <h1>Assignment 4</h1>
    
    <?php
    	include 'menu.html';
    	include 'database.php';
    	
    	if(array_key_exists("submit", $_REQUEST))
    	{
    		$pair=array(strtolower($_REQUEST["word"]),strtolower($_REQUEST["synonym"]));
    		
    		$synonyms0="";
    		$synonyms1="";
    		$synonymsTotal="";
    		
    		$result=mysqli_query($link,"select * from synonym ;");
    		while ($rows=mysqli_fetch_row($result))
    		{
    			if ($pair[0]==$rows[0])
    				$synonyms0=$rows[1];
    			
    			if ($pair[1]==$rows[0])
    				$synonyms1=$rows[1];
    		}
    		
    		$synonymsTotal=$synonyms0.$synonyms1.$pair[0]." ".$pair[1]." ";
    		
    		$synonymsTotalArray=explode(" ", $synonymsTotal);			// creating array '$synonymsTotalArray' from synonyms string '$synonymsTotal';
    		array_pop($synonymsTotalArray);		// for removing last blank ""
    		
    		$synonymsTotalArray=array_unique($synonymsTotalArray);		// removing duplicate from that array '$synonymsTotalArray'
    		
    		$synonymsTotal="";
    		foreach ($synonymsTotalArray as $value) {
    			$synonymsTotal=$synonymsTotal.$value." ";			// then converting this array '$synonymsTotalArray' back to the string '$synonymsTotal'
    		}
    		
    		foreach ($synonymsTotalArray as $value) {
    			
    			$temp=str_replace($value." ", "", $synonymsTotal);
    				
    			$result=mysqli_query($link,"select * from synonym where word ='".$value."' ;");
    				
    			if($row=mysqli_fetch_row($result))		// word exist , so update
    				mysqli_query($link,"update synonym set synonyms='".$temp."' where word='".$value."' ; ");
    			else			// word doesn't exist , so insert
    				mysqli_query($link,"insert into synonym(word,synonyms) values('".$value."','".$temp."') ;");
    		}
    		
    		header("location:4.php");
    	}
    	
	?>
    <p>Problem : word and synonyms insertion into database under some constraints </p>
    
    Enter the word pair : <br/>
    <form action="#" method="post" >
    	<input type="text" name="word" />
        <input type="text" name="synonym" /><br/>
        <input type="submit" name="submit" value="submit" />
    </form>
    
    <h4>Word-Synonyms table (from database) is given below :</h4>
    <table>
    	<tr>
    		<th>word</th>
    		<th>synonyms</th>
    	</tr>
	    <?php
	    
	    	$result=mysqli_query($link,"select * from synonym;");
	    	while ($rows=mysqli_fetch_row($result))
	    	{
	    		echo "<tr>\n<th>".$rows[0]."</th>\n<th>".$rows[1]."</th>\n</tr>";
	    	}
	    	
		?>
	</table>
	
    </body>
</html>