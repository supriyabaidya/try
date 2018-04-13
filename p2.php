<?php
	
	include 'database.php';
	
	$result=mysqli_query($link, "select * from word ;");
	$rowCount=mysqli_num_rows($result);
	
	$row=mysqli_fetch_row(mysqli_query($link, "select * from word where id= ".rand(1,$rowCount).";"));
	
	echo $row[1];
?>