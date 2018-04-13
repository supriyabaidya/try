<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Exam</title>
	</head>
	<body>
	    <p>This is 1exam.php</p>
	    <?php
	    	echo "in php";
	    	$word ="word";
	    	$array_Word=str_split($word,1);
// 	    	$array_Word =count_chars($word,1);
// 	    	print_r($array_Word);
	    	
// 	    	foreach ($array_Word as $key=>$value) {
// // 	    		echo $key;
// 	    		echo chr($key);
// 	    	}
	    	for ($i = 0; $i < sizeof($array_Word); $i++) {
	    		echo $array_Word[$i];
	    	}
	    	
		?>
	</body>
</html>