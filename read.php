<?php 
	session_start();
	$name = "";
	$age = "";
	$symptoms = "";
	$errors=array();
	//we have then connect server.php to the database
	$connect=mysqli_connect('localhost','root','','hospital');
	//register a new user
	if (isset($_POST['sym'])){
	//Mysqli_real_escape_string is used to avoid special characters
		$name=mysqli_real_escape_string($connect,$_POST['name']);
		$age=mysqli_real_escape_string($connect,$_POST['age']);
		$symptoms=mysqli_real_escape_string($connect,$_POST['symptoms']);

	if (empty($name)) {
		array_push($errors,"Name is required");
	}
	if (empty($age)) {
		array_push($errors,"Age is required");
	}
	if (empty($symptoms)) {
		array_push($errors,"Symptoms are required");
	}
	$read="SELECT * FROM records WHERE name='$name', age='$age', symptoms='$symptoms'";
	
	echo "$read";
	}


 ?>