<?php include('main.php') ?>
<?php
	$db = mysqli_connect('localhost', 'root', '19961211', 'registration');

	$selected = "";
	if(isset($_POST['submit'])){
		if(!empty($_POST['check'])){
			foreach($_POST['check'] as $check){
				$selected .= $check;
				$selected .= "/#/";
			}
		}

		$selected = substr($selected, 0, -3);

		//Check duplicity if so, override previous one
		$sql = "SELECT * FROM `data`";
		$result = mysqli_query($db,$sql)or die(mysqli_error($db));
	
		$checkArray = array();
		$index = 0;
		$flag = 0;
		while($rows = mysqli_fetch_array($result)){
			$checkArray[$index] = $rows;
			$index++;
		}

		foreach($checkArray as $value){
			if($value['Picture'] == $img[$imgIndex]){
				$sql = "UPDATE `data` SET `Sentence`='$selected' WHERE `Picture`='$img[$imgIndex]'";
				$flag = 1;
			}
		}
	
		if($flag == 0){
			$sql = "INSERT INTO data (Caption, Picture, Sentence) VALUES ('$title','$img[$imgIndex]', '$selected')";
		}

		echo "<br><br>";
		if(!mysqli_query($db, $sql)){
			echo 'Not inserted <br>';
		}
		else{
			echo 'Data inserted successfully <br>';
		}


		//Reset or increase
		if($imgIndex + 1 >= sizeof($img)){
			$artIndex++;
			$imgIndex = 0;
		} 
		else{
			$imgIndex++;
		}

		//Save indexes
		$sql = "UPDATE `save` SET `artIndex`=$artIndex,`imgIndex`=$imgIndex WHERE 1";
		mysqli_query($db,$sql);

		header('location: index.php');
	}
	
	
?>