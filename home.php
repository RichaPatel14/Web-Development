<?php
   session_start();
	
?>
<html>
   
   <head>
      <title>Home</title>
	   <meta charset="utf-8">
	<meta name="viewport" content="width=device-width" initial-scale="1">
	<link rel="stylesheet" href="style.css" type="text/css">
   </head>
   
   <body>
      <div class="container-hd">
	
			<div class="header">
				<span class="logo"><img src="icons/logo/logo.png"></span>
				<span class="logoname"><p>World shop</p></span>
				<ul id="topMenu" class="nav">
	 				<li><a href="Makeup.php">MakeUp</a></li>
	 				<li><a href="Dress.php">Dress</a></li>
					<li><a href="shoes.php">Shoes</a></li>
					<li><a href="cart.php"><li1><img src="icons/logo/ico-cart.png"></li1><li1>Cart</li1></a></li>
					<li class="user1"><img src="icons/logo/boy-512.png">Hello! <?php include('session.php'); echo $login_session; ?></li>
					<li><a href = "logout.php">Sign Out</a></li>
	 			 </ul>

			</div>
		</div>
	
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
	   <footer>
				<div class="foot-container">
			<div class="copyright">
				<p>&copy; Richa Patel-8334401 </p>
				<p id="demo">
			<button type="button" class="btn" onclick="loadDoc()">About US</button>
				</p>
				</div>
		</div>
				
	</footer>			
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "About.txt", true);
  xhttp.send();
}
</script>
		
	
</body>   
</html>