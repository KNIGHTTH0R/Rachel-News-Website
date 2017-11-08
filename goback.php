<?php include('main.php') ?>
<?php
	if(isset($_POST['submit'])){
		$db = mysqli_connect('localhost', 'root', '19961211', 'registration');
		//Reset or increase
		if($imgIndex - 1 <= -1){
			if($artIndex > 0){
				$artIndex--;
				$img = explode('/#/',$a[$artIndex]["Image"]);
				$imgID = explode('/#/', $a[$artIndex]["ImageID"]);
				$imgIndex = sizeof($img) - 1;
			}
		} 
		else{
			$imgIndex--;
		}

		//Save indexes
		$sql = "UPDATE `save` SET `artIndex`='$artIndex',`imgIndex`='$imgIndex' WHERE `username`='$username' AND `section`='$section'";
		mysqli_query($db,$sql);

		header('location: index.php');
	}
	else{
		echo "Do not directly access this page";
	}
?>