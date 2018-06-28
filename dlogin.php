<?php include('dserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Login</title>
	<style type="text/css">
		form{
			text-align: center;
		}
		body{
			background-color: black;
		}
		input{
			border-radius: 10px;
			width: 400px;
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
	<h2 style="text-align: center; color: white; font-size: 50px;">Login</h2>
	<form action="dlogin.php" method="post">
		<?php include('errors.php'); ?>
		<label style="color: white;">Identification Number</label><br>
		<input type="text" name="id"><br><br>
		<label style="color: white;">Password</label><br>
		<input type="password" name="password"><br><br>
		<button type="submit" name="log">Login</button>
		<p style="color: white;">Haven't registered yet?Click <a href="doctor.php">here</a> to register</p>
	</form>
</body>
</html>