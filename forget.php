
<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
	}
if(isset($_POST['forget']) && $_POST['forget'] != ""){
$conn = mysqli_connect('localhost', 'root');
	
if($conn){

		mysqli_select_db($conn,'login');
		$code='asdfsd@dasd#';$code=md5($code);
		$username=$_POST['fusrname'];
			$username=sha1($username); $username=md5($username); $username=crypt($username,$code);
		$email=$_POST['femail'];
			$email=sha1($email); $email=md5($email); $email=crypt($email,$username);
		$password=$_POST['fpass'];
			$password=md5($password); $password=sha1($password); $password=crypt($password,$username);
		$q="SELECT * FROM `register` WHERE username='$username' && email='$email' ";
		$result=mysqli_query($conn, $q) or die(mysqli_close($conn));
		
		$num =mysqli_num_rows($result);
		
		if($num==1){
			$q1="UPDATE `register` SET `password`='$password' WHERE username='$username' ";
			mysqli_query($conn,$q1);
			
			echo"<script type='text/javascript'>alert('Reset Password Successfully');
			window.location='Verify.html'
			</script>";
		}else{
			echo"<script type='text/javascript'>alert('Please Enter correct information');
			window.location='forget.php'
			</script>";
		}
		
	}else{
		echo "connection failed";
	}
}
?>
<html>
	<head>
		<title>Forgetpass</title>
		<meta charset="utf-8">
	
		<link rel="stylesheet" href="style.css" type="text/css">
		<script src="Javascript/Registration-login.js" type="text/javascript"></script>
	</head>
	
	<body>
	
		<div class="login">
			<h1>Reset Password</h1>
			
			<form action="forget.php" method="post" onsubmit="return validation()" autocomplete="off">
					
				
					<div class="textbox">
					<img src="icons/user.svg">
					<input type="text" placeholder="Username*" name="fusrname" id="usr" title="It consist of Charater only" required >
					</div>
					<span id="usr1"> </span>
		
					<div class="textbox">
					<img src="icons/email.svg">
					<input type="email" placeholder="Email*" name="femail" id="email" required pattern="[A-za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email id must be in this format: xyz@xyx.xhx" >
					</div>
					<span id="email1"> </span>
				
					<div class="textbox">
					<img src="icons/key.svg"  id="pass2">
					<input type="password" placeholder="Password*" name="fpass" id="pass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
					</div>
					<span id="pass1"> </span>
			
		<div class="textbox">
				<img src="icons/key.svg">
				<input type="password" placeholder="Retype Password*" name="pass" id="conpass" required>
		</div>
			<span id='conpass1'></span>
					
					<input class="btn" type="submit" name="forget" value="Forget" id="submit">
					
					<div class="reg">
					<p>Back to login =><a href="Verify.html">Click Here</a></p>
					</div>

			</form>
		
		</div>
	
<?php include_once('footer.php');?>			

	</body>
</html>
