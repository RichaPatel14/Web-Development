<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
	}
		if(!isset($_SESSION['login_user'])){
      header("location:Verify.html");
      die();
		
    } 
?>
<html>
   
   <head>
      <title>Home</title>
	   <meta charset="utf-8">
	<meta name="viewport" content="width=device-width" initial-scale="1">
	<link rel="stylesheet" href="style.css" type="text/css">
   </head>
   
 <body>
 	 <?php require_once('header.php'); ?>    
	 
	   <br><br>
		<div class="container">
			<div class="head">
				<h2>Product</h2>
			</div>
			
			<div class="product">
			<span>
				<div>
					<a href="Makeup.php"><img src="Img/camera/eyeshadow.jpg"></a>
				</div>
					<p>MakeUp</p>
				<div class="port">
					<a href="Makeup.php" target="_parent"><button>View</button></a>
			
				</div>
				
			</span>
				
			
			<span>
				<div>
					<a href="Dress.php"><img src="Img/camera/dressHome.jpg"></a>
				</div>
					<p> Dress </p>
				<div class="port">
					<a href="Dress.php" target="_parent"><button>View</button></a>
					
				</div>
					
			</span>
			
			
			<span>
				<div>
					<a href="shoes.php"><img src="Img/camera/b3.jpg"></a>
				</div>
					<p>Shoes</p>
				<div class="port">
					<a href="shoes.php" target="_parent">
					<button>View</button></a>
				
				</div>
			</span>		
			</div>
	</div>
	  <?php require_once('footer.php'); ?>
		
	
</body>   
</html>
