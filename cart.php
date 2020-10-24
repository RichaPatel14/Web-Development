<?php
	session_start();

	
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width" initial-scale="1">
	
		<meta charset="utf-8">
	<title>Cart</title>
		
		<link rel="stylesheet" href="style.css" type="text/css">
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
		<form action="delete.php" method="post">
		<div class="container">
			<div class="head">
			<h2>Your Cart Products</h2>
			</div>
			<table>
				<thead>
				<tr>
					<td>Sno</td>
					<td>Name</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Total Price</td>
					<td></td>
				</tr>
				</thead>
					<?php					
					if(!isset($_SESSION['cart'])||count($_SESSION['cart'])<1){
						echo "<script type='text/javascript'>alert('Your Shoppping Cart is Empty');
						window.location='home.php';
						</script>";
					}else{
						$sno=0;
						$i=0;
					 foreach((array)$_SESSION['cart'] as $products){
						 $q=$products['quantity'];
						 $p=$products['price'];
						 $id=$products['prodname'];
						 echo "<tr class='nameitem'>";
						 $sno++;
						 		echo "<td>".$sno."</td>";
						 
						 		$n=$products['name'];
								echo "<td>".$n."</td>";
								
								echo "<td>"."CAD $".$p."</td>";
						 
									echo "<td><button type='submit' class='btn' name='dec' value='$id'>-</button>".$q."<button type='submit' class='btn' name='inc' value='$id'>+</button>"."</td>";		
								
						 		$bill=($q*$p);
						 		echo "<td>$bill</td>";						 
						 		
						 		echo "<td><button type='submit' class='btn' name='index' value='$i'>DELETE</button></td>";
						 echo "</tr>";
						 $i++; 					
					 }						 
					}			
					?>
			</table>			
		</div>
		</form>	
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
