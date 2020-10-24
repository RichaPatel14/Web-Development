<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
  $conn = mysqli_connect('localhost', 'root','','login');
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select username from register where username = '$user_check' ") or die( mysqli_error($db));
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>