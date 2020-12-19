<?php
if(!isset($_SEESION)){
session_start();
}
$conn=mysqli_connect('localhost', 'root');

if($conn){
	if(mysqli_select_db($conn, 'login')){
	$code='asdfsd@dasd#';$code=md5($code);
	$username=$_POST['username'];
	$_SESSION['username']=$username;
		$username=sha1($username); $username=md5($username); $username=crypt($username,$code);
		
	$q="SELECT * FROM `register` WHERE BINARY username='$username' ";

	$result = mysqli_query($conn, $q);

	$num =mysqli_num_rows($result);
		if($num==1){
			$_SESSION['login_user']=$username;
			header('location:pass.php');
		}else{
			echo "<script type='text/javascript'>alert('Username does not exists');
			window.location='Verify.html';
			</script>";
		}
}else{
	echo "<script type='text/javascript'>alert('Technical Fault! Server/ Database down. Please try again later');
	window.location='Verify.html';
	</script>";
}
	
}else{
	echo"Connection falied";
}
?>
