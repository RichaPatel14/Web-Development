<?php
   include('session.php');
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<html>
	<head>
		<meta name="viewport" content="width=device-width" initial-scale="1">
	
	<meta charset="utf-8">
		<title>Shoes</title>
		
		<link rel="stylesheet" href="style.css" type="text/css">
		<script>
		function setcookie(val){
			var time = new Date();
			time.setTime(time.getTime() + 57347327*7);
			console.log(time);
			document.cookie= "RCcookie="+val+"; expires=" +time.toUTCString() + ";" + "path=/ ";
			console.log(document.cookie);
		}
		</script>
	</head>
	
	<body>
		<div class="container-hd">
	
			<div class="header">
				<span class="logo"><img src="icons/logo/logo.png"></span>
				<span class="logoname"><p>World shop</p></span>
				<ul id="topMenu" class="nav">
					<li><a href="home.php">Home</a></li>
	 				<li><a href="Makeup.php">MakeUp</a></li>
	 				<li><a href="Dress.php">Dress</a></li>
					<li><a href="shoes.php">Shoes</a></li>
					<li><a href="cart.php"><li1><img src="icons/logo/ico-cart.png"></li1><li1>Cart</li1></a></li>
					<li class="user1"><img src="icons/logo/boy-512.png">Hello! <?php include('session.php'); echo $login_session; ?></li>
					<li><a href = "logout.php">Sign Out</a></li>
	 			 </ul>

			</div>
		</div>
		
		<form action="insertcart.php" method="post">
		<div class="container1">
			<div class="display">
				<img src="Img/camera/shoes2.jpg">
			</div>
			<div class="detail">
				<p class="new">NEW</p>
				<h2><input type="hidden" value="Multi color Shoes" name="name">Multi color Shoes</h2>
				<p><input type="hidden" value="canvas12" name="prodname">Product Code:canvas12</p>
				<field class="star">
					
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					
				</field>
				
				<p class="price"><input type="hidden" value="100.00" name="price">CAD $100.00</p>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> Canvas</p>
				<label>Quantity:</label>
				<select class="quantity" id="item_count" name="quantity"  onchange="setcookie(this.value)" >
					<option selectedIndex="<?php echo $_COOKIE['RCcookie']?>-1">1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					
				</select>
				<button type="submit" class="btn">Add To Cart</button>
			</div>
			
		</div>
		</form>
		<form action="insertcart.php" method="post">
		<div class="container1">
			<div class="display">
				<img src="Img/camera/shoes3.jpg">
			</div>
			<div class="detail">
				<p class="new">NEW</p>
				<h2><input type="hidden" value="High Heel Shoe" name="name">High Heel Shoe</h2>
				<p><input type="hidden" value="bata12" name="prodname">Product Code:bata12</p>
				<field class="star">
					
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					
				</field>
				
				<p class="price"><input type="hidden" value="150.00" name="price">CAD $150.00</p>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> Bata Company</p>
				<label>Quantity:</label>
				<select class="quantity" id="item_count" name="quantity"  onchange="setcookie(this.value)" >
					<option selectedIndex="<?php echo $_COOKIE['RCcookie']?>-1">1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					
				</select>
				<button type="submit" class="btn">Add To Cart</button>
			</div>
			
		</div>
		</form>
		<form action="insertcart.php" method="post">
		<div class="container1">
			<div class="display">
				<img src="Img/camera/shoes4.jpg">
			</div>
			<div class="detail">
				<p class="new">NEW</p>
				<h2><input type="hidden" value="Summer sandle" name="name">Summer sandle</h2>
				<p><input type="hidden" value="aike12" name="prodname">Product Code:aike12</p>
				<field class="star">
					
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					
				</field>
				
				<p class="price"><input type="hidden" value="100.00" name="price">CAD $100.00</p>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> AIKE Asia</p>
				<label>Quantity:</label>
				<select class="quantity" id="item_count" name="quantity"  onchange="setcookie(this.value)" >
					<option selectedIndex="<?php echo $_COOKIE['RCcookie']?>-1">1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					
				</select>
				<button type="submit" class="btn">Add To Cart</button>
			</div>
			
		</div>
		</form>
		<footer>
				<div class="foot-container">
			<div class="copyright">
				<p>&copy; Richa Patel-8334401 </p>
			<p id="demo"><button type="button" class="btn" onclick="loadDoc()">About US</button></p>
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
