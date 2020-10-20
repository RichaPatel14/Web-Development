<?php

session_start();


$conn = mysqli_connect('localhost', 'root');

if($conn){
	echo "connection successful";
}else{
	echo "connection falied";
}

mysqli_select_db($conn, 'login');

$username=$_POST['username'];
$password=$_POST['password'];

$q="SELECT * FROM `register` WHERE BINARY username='$username' && BINARY password='$password' ";

$result = mysqli_query($conn, $q);

$num =mysqli_num_rows($result);

if($num==1){
	$_SESSION['login_user']=$username;
	header('location:home.php');
}else{
	echo "<script type='text/javascript'>alert('Wrong Username or Password');
	window.location='login.html';
	</script>";
}
?>