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
$email=$_POST['emailid'];
$password=$_POST['pass'];
$mobile=$_POST['number'];
$website=$_POST['address'];

$q="SELECT * FROM `register` WHERE username='$username' &&  email='$email' ";


$result = mysqli_query($conn, $q) or die(mysql_error($conn));

$num =mysqli_num_rows($result);

if($num==1){
	echo "<script type='text/javascript'>alert('Already Register');
	window.location='Registration.html';
	</script>";
}else{
	$qw="INSERT INTO `register` (`username`, `email`, `password`, `mobile`, `website`) VALUES ('$username', '$email', '$password', '$mobile', '$website')";
	mysqli_query($conn,$qw);
	echo "<script type='text/javascript'>alert('Register Successfully');
	window.location='login.html';
	</script>";
}




?>