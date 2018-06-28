<?php 
session_start();
$name="";
$errors=array();
//we have then connect server.php to the database
$connect=mysqli_connect('localhost','root','','hospital');
//register a new user
if (isset($_POST['p_reg'])){
//Mysqli_real_escape_string is used to avoid special characters
	$name=mysqli_real_escape_string($connect,$_POST['name']);
	$psw1=mysqli_real_escape_string($connect,$_POST['psw1']);
	$psw2=mysqli_real_escape_string($connect,$_POST['psw2']);

if (empty($name)) {
	array_push($errors,"Name is required");
}
if (empty($psw1)) {
	array_push($errors,"Password is required");
}
if (empty($psw2)) {
	array_push($errors,"Password mismatch");
}
$check_user="SELECT * FROM patient WHERE name='$name' LIMIT 1";
$result=mysqli_query($connect,$check_user);
$user=mysqli_fetch_assoc($result);
if (count($errors)==0) {
	$password=md5($psw1);
	$qq="INSERT INTO patient(name,password) VALUES ('$name','$password')";
	mysqli_query($connect,$qq);
	$_SESSION['name']=$name;
	$_SESSION['success']="Successful signup";
	header('location:pindex.php');
}
}
if (isset($_POST['p_log'])) {
	$name=mysqli_real_escape_string($connect,$_POST['name']);
	$password=mysqli_real_escape_string($connect,$_POST['password']);
	if (empty($name)) {
		array_push($errors,"Input Name");
	}
	if (empty($password)) {
		array_push($errors,"Input password");
	}
	if (count($errors)==0) {
		$password=md5($password);
		$qq="SELECT * FROM patient WHERE name='$name' AND password ='$password'";
		$result=mysqli_query($connect,$qq);
		if (mysqli_num_rows($result)==1) {
			$_SESSION['name']=$name;
			$_SESSION['success']="Login successful";
			header('location:pindex.php');
		}
		else{
			array_push($errors,"Wrong password or name");
		}
	}
}
 ?>
