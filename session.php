<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	$user_check = $_SESSION['login_user'];
  
?>
