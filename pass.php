<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
	}
	if(!isset($_SESSION['login_user'])){
      header("location:Verify.html");
      die();
		
    } 
	if(isset($_POST['pass']) && $_POST['pass'] != ""){
		$conn=mysqli_connect('localhost', 'root','','login');

	if($conn){
		$code='asdfsd@dasd#'; $code=md5($code);

		$username=$_SESSION['login_user'];


		$password=$_POST['password'];
			$password=md5($password); $password=sha1($password); $password=crypt($password, $username);
		$q="SELECT * FROM `register` WHERE BINARY username='$username' && BINARY password='$password' ";

		$result = mysqli_query($conn, $q);

		$num =mysqli_num_rows($result);

	if($num==1){

		header('location:home.php');
	}else{

		echo "<script type='text/javascript'>alert('Wrong Password');
		window.location='pass.php';
		</script>";
	}
	}else{
		echo"connection falied";
	}
		}
?>
<html>
<head>
	<meta name="viewport" content="width=device-width" initial-scale="1">
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="style.css" type="text/css">
	<script src="Javascript/Registration-login.js"></script>
	
</head>
<body>
	<div class="login">
		<h1>Login</h1>
		<h2><?php  echo $_SESSION['username']; ?></h2>
		
		<form action="pass.php" method="post" onsubmit="return validation()" autocomplete="off">
		
			<div class="textbox">
			<img src="icons/key.svg"  id="pass2">
			<input type="password" placeholder="Password*" name="password" id="pass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
			</div>
			
			<input type="submit" class="btn" name="pass" value="Login">
			
			<div class="reg">
			<p>Forget Password =><a href="forget.php">Click Here</a></p>
			</div>
		</form>
	</div>
	<?php include_once('footer.php');?>
</body>
</html>