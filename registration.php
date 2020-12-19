<?php

if(!isset($_SESSION)){
	session_start();
}


$conn = mysqli_connect('localhost', 'root');

if($conn){

	if(mysqli_select_db($conn, 'login')){
		$code='asdfsd@dasd#';
		$code=md5($code);
		$name=$_POST['name'];	
		$username=$_POST['username'];
	 		$username=sha1($username); $username=md5($username); $username=crypt($username,$code);

		$email=$_POST['emailid'];
			$email=sha1($email); $email=md5($email); $email=crypt($email,$username);
		$password=$_POST['pass'];
			$password=md5($password); $password=sha1($password); $password=crypt($password,$username);
		$countrycode=$_POST['countrycode'];
		$mobile=$_POST['number'];
		
		$q="SELECT * FROM `register` WHERE username='$username' ||  email='$email' ";

		$result = mysqli_query($conn, $q) or die(mysqli_error($conn));

		$num =mysqli_num_rows($result);

		if($num==1){
			echo "<script type='text/javascript'>alert('Already Register');
			window.location='Registration.html';
			</script>";
		}else{
			$qw="INSERT INTO `register` (`name`, `username`, `email`, `password`, `countrycode`, `mobile`) VALUES ('$name', '$username', '$email', '$password', '$countrycode' , '$mobile')";
			mysqli_query($conn,$qw);
			echo "<script type='text/javascript'>alert('Register Successfully');
			window.location='Verify.html';
			</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('Technical Problem, Please try again later'); 
		window.location='Registration.html';
		</script> ";
	}
}else{
	echo "<script type='text/javascript'>alert('connection falied! Please try again later');
	window.location='Registration.html';
	</script>";
}


?>
