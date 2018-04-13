<?php
	
	include 'database.php';
	
	if(mysqli_query($link, "select * from word ;")!=false)
	{
		mysqli_query($link, "truncate word ;");
		echo " 'word' table exists , so truncated it and reinserted the dictionary file into the table .";
	}
	else
	{
		mysqli_query($link, "create table word(id int auto_increment primary key,word varchar(30)) ;");
		echo " 'word' table doesn't exist , so created it and inserted the dictionary file into the table .";
	}
	
	$myfile = fopen("dictionary.txt","r");
	
	while (!feof($myfile))
	{
		$word=rtrim(strtolower(fgets($myfile)));			// rtrim to clean unwanted characters from the end of the string
		
		if(strlen($word)>=5 && ctype_alpha($word))
			@mysqli_query($link, "insert into word(word) values('".$word."');");
	}
	
	fclose($myfile);
	
// 	header("location:javascript://history.go(-1)");
?>