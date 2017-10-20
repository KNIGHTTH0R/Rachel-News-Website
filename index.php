<?php include('main.php') ?>

<!DOCTYPE html>
<html>
<style>
	body{
		background: #F8F8FF;
	}
</style>
<head>
	<title>Home Page</title>
</head>

<body>
<!-- logged in user information -->
<?php  if (isset($_SESSION['username'])) :?>
	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
<?php endif ?>

<h3 style="text-align:center">News ID: <?php echo $newsID;?>  Image ID: <?php echo $imgID[$imgIndex]?></h3>
<h3 style="text-align:center">Title: <?php echo $title;?></h3>
<h3 style="text-align:center">Date: <?php echo $a[$artIndex]["Date"];?> </h3>
<h3 style="text-align:center">Number of sentences: <?php echo $a[$artIndex]["NumSentence"];?></h3>

<div style="float:left; width:50%;">
	<h3> picture<?php echo ($imgIndex + 1);?></h3>
	<img src="<?php echo $img[$imgIndex];?>" style="width:500px;height:380px;">
	<form action="goback.php" method="post">
		<input type="submit" name = "submit" value="Go backward">
	</form>
	<br>
	<form action="gofront.php" method="post">
		<input type="submit" name = "submit" value="Go forward">
	</form>
</div>

<div style="float:left; width:50%;">
	<h3> Please select sentences choices below: </h3>
	<form action="action.php" method="post">
		<?php 
			$db = mysqli_connect('localhost', 'root', '19961211', 'registration'); 
			$checkArray = array();
			$index = 0;
			$flag = 0;
			$tmp = array();
			$sql = "SELECT * FROM `data`";
			$result = mysqli_query($db,$sql)or die(mysqli_error($db));

			while($rows = mysqli_fetch_array($result)){
				$checkArray[$index] = $rows;
				$index++;
			}

			foreach($checkArray as $value){
				if($value['PhotoID'] == $imgID[$imgIndex]){
					$flag = 1;
					$tmp = explode('/#/', $value['Sentence']);
				}
			}

			foreach($sentence as $value):
				$checked = 0;
				if($flag == 1){
					foreach($tmp as $a){
						if($a == $value){
							$checked = 1;
						}
					}
				}
		?>
    		<input type="checkbox" name="check[]" value="<?php echo $value;?>" <?php if ($checked == 1){echo 'checked';}?>> <?php echo $value;?><br>
    	<?php endforeach; ?>	
			<br>
		<input type="submit" name = "submit" value="Submit">
	</form>

</div>
</body>
</html>