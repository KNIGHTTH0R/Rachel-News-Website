<?php include('main.php') ?>
<?php
	if(isset($_POST['submit'])){
		$db = mysqli_connect('localhost', 'root', '19961211', 'registration');
		//Reset or increase
		if($imgIndex + 1 >= sizeof($img)){
			if($artIndex < sizeof($a) - 1){
				$artIndex++;
				$imgIndex = 0;
			}
		} 

		else{
			$imgIndex++;
		}

		//Save indexes
		$sql = "UPDATE `save` SET `artIndex`=$artIndex,`imgIndex`=$imgIndex WHERE 1";
		mysqli_query($db,$sql);

		header('location: index.php');
	}
	else{
		echo "Do not directly access this page";
	}
?>