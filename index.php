<?php include('main.php') ?>
<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

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
<?php  if (isset($_SESSION['username'])) : ?>
	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
<?php endif ?>
		
<h3 style="text-align:center">Title: <?php echo $title;?></h3>
<h3 style="text-align:center">Date: <?php echo $a[$artIndex]["Date"];?> </h3>
<h3 style="text-align:center">Number of sentences: <?php echo $a[$artIndex]["NumSentence"];?></h3>

<div style="float:left; width:50%;">
	<h3> picture<?php echo ($imgIndex + 1);?></h3>
	<img src="<?php echo $img[$imgIndex];?>" style="width:400px;height:304px;">
	<form action="goback.php" method="post">
		<input type="submit" name = "submit" value="Go back">
	</form>
	<br>
	<form action="gofront.php" method="post">
		<input type="submit" name = "submit" value="Go front">
	</form>
</div>

<div style="float:left; width:50%;">
	<h3> Please select sentences choices below: </h3>
	<form action="action.php" method="post">
		<?php foreach($sentence as $value): ?>
    		<input type="checkbox" name="check[]" value="<?php echo $value;?>"><?php echo $value;?><br>
    	<?php endforeach; ?>	
			<br>
		<input type="submit" name = "submit" value="Submit">
	</form>

</div>
</body>
</html>