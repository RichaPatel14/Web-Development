<?php 
	session_start();
	
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
	?>