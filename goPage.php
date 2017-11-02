<?php
include('main.php');

	if(isset($_POST['submit'])){
		$db = mysqli_connect('localhost', 'root', '19961211', 'registration');
		$page = mysqli_real_escape_string($db, $_POST['page']);
		$img = mysqli_real_escape_string($db, $_POST['image']);
		$sql = "SELECT `ImageID` FROM `nyp` WHERE `NewsID`='$page'";
		$result = mysqli_query($db,$sql);
		$row=mysqli_fetch_row($result);
		$result = $row[0];
		$result= explode('/#/', $result);
		$i = 0;
		$image =0;
		foreach($result as $tmp){
			if($img == $tmp){
				$image = $i;
			}
			$i = $i + 1;
		}

		$page = (int)substr($page, 3) - 1;
		if($page != -1){
			$sql2 = "UPDATE `save` SET `artIndex`='$page',`imgIndex`='$image' WHERE `username`='$username'";
			mysqli_query($db,$sql2);
		}
	}
	else{
		echo "Do not directly access this page";
	}

	header('location: index.php');
?>