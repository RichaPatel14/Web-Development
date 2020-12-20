<?php
	session_start();
	if(!isset($_SESSION['login_user'])){
      header("location:Verify.html");
      die();
		}
	$usr=$_SESSION['login_user'];
	$conn=mysqli_connect('localhost','root','','login');
if(isset($_POST['incart']) && $_POST['incart']!=""){
			if (isset($_POST['price'])){
			$price=$_POST['price'];
		}
	if (isset($_POST['quantity'])){
		$quantity=$_POST['quantity'];
		}
	if(isset($_POST['prodname'])){
		$prodname=$_POST['prodname'];
	}

	if (isset($_POST['name'])) {
	   $name=$_POST['name'];
		$Found = false;

		if(!isset($_SESSION['cart']) || count($_SESSION['cart'])<1){
			$_SESSION['cart'] = array(0=>array("name"=>$name, "price"=>$price, "quantity"=>$quantity,"prodname"=>$prodname));

			echo "<script type='text/javascript'>alert('Added to cart');
			window.location='home.php';</script>";
		}else{
		  foreach ($_SESSION["cart"] as &$item) { 
				if ($item['prodname'] == $prodname) {
					$item['price']==$price;
					$item['quantity'] += $quantity;
					$Found = true;
					echo "<script type='text/javascript'>alert('Already added to cart.We increase quantity');
			window.location='home.php';</script>";
					break;
				}
				}if($Found == false) {
				   array_push($_SESSION["cart"], array("name" => $name, "price" => $price, "quantity" => $quantity,"prodname"=>$prodname	));

				echo "<script type='text/javascript'>alert('Added to cart');
			window.location='home.php';</script>";
			   }
			   }

	}
}

	$q="SELECT * FROM `cart` WHERE `username`='$usr'";
	$result=mysqli_query($conn,$q);
	$num=mysqli_num_rows($result);
//delete	
if(isset($_POST['index']) && $_POST['index'] != "") {
 
 	$key= $_POST['index'];
	
	$arr=$_SESSION["cart"]["$key"];

	$key1=$arr['prodname'];
	print_r($key);
	print_r($key1);
	
		
	
	if(count($_SESSION["cart"]) <= 1) {
		unset($_SESSION["cart"]);
		
	} else {
		unset($_SESSION["cart"]["$key"]);
		sort($_SESSION["cart"]);
	}
	
		$d="DELETE FROM `cart` WHERE `ProductName`= '$key1' && `username`='$usr'";
		
		mysqli_query($conn,$d);

}
//decerement	
if(isset($_POST['dec']) && $_POST['dec'] != "") {
		$key=$_POST['dec'];
	
		foreach ($_SESSION["cart"] as &$item) {
			if($item['prodname'] == $key){
				$item['quantity'] -= 1;
				if($item['quantity']<1){
					$item['quantity']=1;
					
				}
				$price=$item['price'];
				$items=$item['quantity'];
				$tp=$price*$items;
				$upd="UPDATE `cart` SET `Quantity`='$items', `Total Price`='$tp' WHERE `ProductName`='$key' && `username`='$usr'";
				mysqli_query($conn,$upd);
				}
				
			}
			
		}

//increment

if (isset($_POST['inc']) && $_POST['inc'] != "") {
		$key=$_POST['inc'];
	
		foreach ($_SESSION["cart"] as &$item) { 
            if ($item['prodname'] == $key){ 
				$item['quantity'] += 1;
				
				$price=$item['price'];
				$items=$item['quantity'];
				$tp=$price*$items;
				$upd="UPDATE `cart` SET `Quantity`='$items', `Total Price`='$tp' WHERE `ProductName`='$key' && `username`='$usr'";
				mysqli_query($conn,$upd);
				 
			   
			   }
			}
			
		}


?>
<html>
	<head>
		<meta name="viewport" content="width=device-width" initial-scale="1">
	
		<meta charset="utf-8">
	<title>Cart</title>
		
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	
	<body>
		
		 <?php require_once('header.php'); ?>
		
		<form action="cart.php" method="post">
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
				$p="SELECT * FROM `cart` WHERE `username`='$usr'";
				$results=mysqli_query($conn,$q);
				$nums=mysqli_num_rows($results);
				
					if($nums>0){
						$Found = false;
					while($row=mysqli_fetch_array($results)){
						$name=$row['Name'];
						$ProductName=$row['ProductName'];
						$Price=$row['Price'];
						$Quantity=$row['Quantity'];
						$TotalPrice=$row['Total Price'];
						if(!isset($_SESSION['cart']) || count($_SESSION['cart'])<1){
							$_SESSION['cart'] = array(0=>array("name"=>$name, "price"=>$Price, "quantity"=>$Quantity,"prodname"=>$ProductName));
							continue;
						}else{
							foreach ($_SESSION["cart"] as &$item) { 
								if ($item['prodname'] == $ProductName){
			 						$Found = true;
									continue;
								}
							}if($Found == false){
								array_push($_SESSION["cart"], array("name" => $name, "price" => $Price, "quantity" => $Quantity,"prodname"=>$ProductName));
								continue;
							}
						}break;			
					}			
					}
		
				if(count($_SESSION['cart'])>0 || $nums>0){
	
				
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
								
								echo "<td>"."IND $".$p."</td>";
						 
									echo "<td><button type='submit' class='btn' name='dec' value='$id'>-</button>".$q."<button type='submit' class='btn' name='inc' value='$id'>+</button>"."</td>";		
								
						 		$bill=($q*$p);
						 		echo "<td>$bill</td>";						 
						 		
						 		echo "<td><button type='submit' class='btn' name='index' value='$i'>DELETE</button></td>";
						 echo "</tr>";
						 $i++; 					
					 }
				}else{
					echo "<script type='text/javascript'>alert('Cart is Empty');
					window.location='home.php';
					</script>";
				}		
					?>
			</table>			
		
			<button type="submit" class="btn" name="checkout" value="checkout" formaction="logout.php">Checkout</button>
		</div>
		</form>	
		
		<?php require_once('footer.php'); ?>
		
	</body>
</html>
