<?php include('read.php'); ?>
<?php 
	session_start(); 

	if (!isset($_SESSION['Name'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: plogin.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['name']);
		header('location: plogin.php');
	}
?>
<?php  if (isset($_SESSION['name'])) : ?>
			<p style="color: white;">Welcome <strong><?php echo $_SESSION['name']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
<?php endif ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style type="text/css">
		form{
			text-align: center;
		}
		body{
			background-color: black;
		}
		input{
			border-radius: 10px;
			width: 300px;
			height: 50px;
			font-size: 30px;
		}
		button{
			border-radius: 8px;
			background-color: paleturquoise;
			width: 100px;
			height: 30px;
		}
		button:hover{
			background-color: purple;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<img src="8.jpeg">
	<form action="pindex.php" method="post">
		<?php include('errors.php'); ?>
		<label style="color: white;">Name</label><br>
		<input type="text" name="name" value="<?php echo "$name"; ?>"><br><br>
		<label style="color: white;">Age</label><br>
		<input type="number" name="age" value="<?php echo "$age"; ?>"><br><br>
		<label style="color: white;">Symptoms</label><br>
		<textarea rows="12" cols="36" name="symptoms" value="<?php echo "$symptoms"; ?>" style="width: 500px;"></textarea><br><br>
		<button type="submit" name="sym">Submit</button>  
	</form>		
</body>
</html>