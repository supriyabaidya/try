<?php

// 	include 'database.php';
	
	$requested_string=$_REQUEST["in"];
	$requested_mode=$_REQUEST["regex"];
	
// 	$response="";
	
// 	$query="select * from products";
	
// 	$result=mysqli_query($link, $query);
	
// 	$match="";
// 	while ($rows=mysqli_fetch_row($result))
// 	{		
// 		if($requested_mode=="beg")
// 		{
// 			if (preg_match("/^".$requested_string."/", $rows[1]))
// 				$match=$match.$rows[1]."<br/>";
// 		}
// 		else if($requested_mode=="end")
// 		{
// 			if (preg_match("/".$requested_string."$/", $rows[1]))
// 				$match=$match.$rows[1]."<br/>";
// 		}
// 		else if($requested_mode=="con")
// 		{
// 			if (preg_match("/".$requested_string."/", $rows[1]))
// 				$match=$match.$rows[1]."<br/>";
// 		}
		
// 	}
	
// 	echo $match==="" ? "no match found" : $match;

echo $requested_string."/".$requested_mode."/".$requested_string."/".$requested_mode;


?>