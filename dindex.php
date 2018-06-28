<?php 
	session_start(); 

	if (!isset($_SESSION['id'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: dlogin.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['id']);
		header("location: dlogin.php");
	}
?>
<?php  if (isset($_SESSION['id'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['id']; ?></strong></p>
<?php endif ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style type="text/css">
		.b{
			text-align: center;
		}
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="b">
		<form action="dindex.php"></form>
		<div class="rec">
			<a href="read.php">Patients Records</a><br><br>
		</div>
		<div class="logo">
			<a href="dlogin.php" name="logout">Logout</a>
		</div>
		<h3 style="text-align: center;">Senior Doctor</h3>
		<img src="snr.jpeg" style="text-align: center;"><br><br>
	</div>
	<h5 style="text-align: center;">Junior Doctors</h5>
	<img src="dr5.jpeg" width="200px" height="150px">
	<img src="dr6.jpeg" width="200px" height="150px">
	<img src="dr1.jpeg" width="200px" height="150px">
	<img src="dr2.jpeg" width="200px" height="150px">

</body>
</html>