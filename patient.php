<?php include('pserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient's Registration</title>
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
	<h2 style="text-align: center; color: white; font-size: 50px;">Registration</h2>
	<form action="patient.php" method="post">
		<?php include('errors.php'); ?>
		<label style="color: white;">Name</label><br>
		<input type="text" name="name" value="<?php echo "$name" ?>"><br><br>
		<label style="color: white;">Password</label><br>
		<input type="password" name="psw1"><br><br>
		<label style="color: white;">Confirm Password</label><br>
		<input type="password" name="psw2"><br><br>
		<button type="submit" name="p_reg">Register</button>
		<p style="color: white;">Registered?Click <a href="plogin.php">here</a> to login</p>
	</form>
</body>
</html>