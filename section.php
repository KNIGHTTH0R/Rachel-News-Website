<?php
	session_start();
	
	if(isset($_POST['submit'])){
		$section = $_POST['section'];
		$_SESSION['section'] = $section;
		header('location: index.php');
	}
	else{
		echo "Do not directly access this page.";
	}
?>