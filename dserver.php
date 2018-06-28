<?php 
session_start();
$identify="";
$errors=array();
//we have then connect server.php to the database
$connect=mysqli_connect('localhost','root','','hospital');
//register a new user
if (isset($_POST['reg'])){
//Mysqli_real_escape_string is used to avoid special characters
	$identify=mysqli_real_escape_string($connect,$_POST['id']);
	$psw1=mysqli_real_escape_string($connect,$_POST['psw1']);
	$psw2=mysqli_real_escape_string($connect,$_POST['psw2']);

if (empty($identify)) {
	array_push($errors,"Identification is required");
}
if (empty($psw1)) {
	array_push($errors,"Password is required");
}
if (empty($psw2)) {
	array_push($errors,"Password mismatch");
}
$check_user="SELECT * FROM user WHERE identification='$identify' LIMIT 1";
$result=mysqli_query($connect,$check_user);
$user=mysqli_fetch_assoc($result);
if ($user['id']===$identify) {
	array_push($errors, "ID exists");
}
if (count($errors)==0) {
	$password=md5($psw1);
	$qq="INSERT INTO user(identification,password) VALUES ('$identify','$password')";
	mysqli_query($connect,$qq);
	$_SESSION['id']=$identify;
	$_SESSION['success']="Successful signup";
	header('location:dindex.php');
}
}
if (isset($_POST['log'])) {
	$identify=mysqli_real_escape_string($connect,$_POST['id']);
	$password=mysqli_real_escape_string($connect,$_POST['password']);
	if (empty($identify)) {
		array_push($errors,"Input ID");
	}
	if (empty($password)) {
		array_push($errors,"Input password");
	}
	if (count($errors)==0) {
		$password=md5($password);
		$qq="SELECT * FROM user WHERE identification='$identify' AND password ='$password'";
		$result=mysqli_query($connect,$qq);
		if (mysqli_num_rows($result)==1) {
			$_SESSION['id']=$identify;
			$_SESSION['success']="Login successful";
			header('location:dindex.php');
		}
		else{
			array_push($errors,"Wrong password or ID");
		}
	}
}
 ?>
