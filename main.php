<?php
	session_start(); 

	$section = $_SESSION['section'];
	$data = $section."data";
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

	$username = $_SESSION['username'];
	$db = mysqli_connect('localhost', 'root', '19961211', 'registration');


	$sql = "SELECT * FROM $section";
	$result = mysqli_query($db,$sql) or die(mysqli_error($db));
	
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
		if($rows['username'] == $username and  $rows['section'] == $section){
			$artIndex = $rows['artIndex'];
			$imgIndex = $rows['imgIndex'];
		}
	}


	$senIndex = 0;
	$sentence = array();
	$img = array();
	$imgID = array();
	$newsID = $a[$artIndex]["NewsID"];
	$sentence = explode('/#/', $a[$artIndex]["Sentences"]);
	$img = explode('/#/',$a[$artIndex]["Image"]);
	$imgID = explode('/#/', $a[$artIndex]["ImageID"]);
	$title = $a[$artIndex]["Caption"];
	
?>