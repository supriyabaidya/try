<?php
	session_start();
?>
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
    	
    	echo "<h3>part 2 : action php of the form of part 1</h3>";
    	
    	
    	$form_data_names=array();
    	$each_form_data_value=array();
    	
    	
    	
    	foreach ($_POST as $key=>$value)
    	{
//     		echo $key." => ".$value."<br/>";
	    	array_push($form_data_names, $key);		//pushing each $key ,i.e, form data names into $form_data_names
	    	
	    	if (array_key_exists($key, $_SESSION)) {
	    		$_SESSION[$key]=$_SESSION[$key]."_".$value;
	    	}
	    	else
	    	{
	    		$_SESSION[$key]=$value;
	    	}
    		
    		array_push($each_form_data_value, explode("_", $_SESSION[$key]));		//pushing each array of corresponding $key ,i.e, form data names into $each_form_data_value,(i,e it is a 2d array) 
    	}
    	
    	echo "<table style=\"background-color: white\">";
    	echo "<tr>";
    	foreach ($form_data_names as $value)
    	{
    		echo "<th>".$value."</th>";
    	}
    	echo "</tr>";
    	
    	
    	for ($i=0;$i<sizeof($each_form_data_value[0]);$i++)
    	{
    		echo "<tr>";
    		foreach ($each_form_data_value as $value)
    		{
    			echo "<td>".$value[$i]."</td>\n";
	    		
	    	}
	    	echo "</tr>";
    	}
    	
    	echo "</table><br/>";
    	
    	$form_data_names=null;
    	$each_form_data_value=null;
    	
    	echo "<a href=\"2_1.html\" >goto form page</a> to submit another set of data";
	?>
    </body>
</html>