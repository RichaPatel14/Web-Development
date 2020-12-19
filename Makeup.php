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
		<title>MakeUp</title>
		
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
		<?php require_once('header.php'); ?>
		
		<form action="insertcart.php" method="post">
		<div class="container1">
			<div class="display">
				<img src="Img/camera/eyeshadow3.jpg">
			</div>
			<div class="detail">
				<p class="new">NEW</p>
				<h2><input type="hidden" value="Eye Shadow" name="name">Eye Shadow </h2>
				<p class="prodname"><input type="hidden" value="eyeshadow154" name="prodname">Product Code:eyeshadow154</p>
				<field class="star">
					
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="unmark">&#9733;</span>
					
				</field>
				
				<p class="price"><input type="hidden" value="224.00" name="price">CAD $224.00</p>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> Kylie </p>
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
				<img src="Img/camera/brushes.jpg">
			</div>
			<div class="detail">
				<p class="new">NEW</p>
				<h2><input type="hidden" value="Brushes" name="name">Brushes </h2>
				<p class="prodname"><input type="hidden" value="brushes154" name="prodname">Product Code:brushes154</p>
				<field class="star">
					
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="unmark">&#9733;</span>
					
				</field>
				
				<p class="price"><input type="hidden" value="22.00" name="price">CAD $22.00</p>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> MAC</p>
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
				<img src="Img/camera/lipstick.jpg">
			</div>
			<div class="detail">
				<p class="new">NEW</p>
				<h2><input type="hidden" value="Lipstick" name="name">Lipstick </h2>
				<p class="prodname"><input type="hidden" value="lipstick154" name="prodname">Product Code:lipstick154</p>
				<field class="star">
					
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="mark">&#9733;</span>
					<span class="unmark">&#9733;</span>
					
				</field>
				
				<p class="price"><input type="hidden" value="150.00" name="price">CAD $150.00</p>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> LakeMe</p>
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
		<?php require_once('footer.php'); ?>
		
</body>
</html>
<?php 

?>
