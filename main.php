<?php
	$db = mysqli_connect('localhost', 'root', '19961211', 'registration');
	$sql = "SELECT * FROM `ny politics`";
	$result = mysqli_query($db,$sql)or die(mysqli_error($db));
	
	
	$a = array();
	$index = 0;
	while($rows = mysqli_fetch_array($result)){
		$a[$index] = $rows;
		$index++;
	}
	
	//Resume indexes
	$sql2 = "SELECT * FROM save";
	$result2 = mysqli_query($db,$sql2)or die(mysqli_error($db));
	while($rows = mysqli_fetch_array($result2)){
		$artIndex = $rows['artIndex'];
		$imgIndex = $rows['imgIndex'];
	}


	$senIndex = 0;
	$sentence = array();
	$img = array();
	$sentence = explode('/#/', $a[$artIndex]["Sentences"]);
	$img = explode('/#/',$a[$artIndex]["Image"]);

	$title = $a[$artIndex]["Caption"];
	
?>