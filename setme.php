<?php

	include 'database.php';
	
	$query = "select * from login_credentials where username ='".$_REQUEST['username']."' and password ='".$_REQUEST['password']."'";
	
	$result=mysqli_query($link, $query);
	
	$rows = mysqli_num_rows($result);
	
	if ($rows == 1)
	{
		if ($_REQUEST['chkremember']=="remember")
		{
			setcookie("login[username]",$_REQUEST['username'],time()+86400);
			setcookie("login[password]",$_REQUEST['password'],time()+86400);
		}
		header('Location:form.php');
	}
	else
	{
		$temp="error";
		header("Location:login.php?".$temp);
	}
		
?>