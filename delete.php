<?php
	session_start();

//delete
	if (isset($_POST['index']) && $_POST['index'] != "") {

 	$key= $_POST['index'];
	if (count($_SESSION["cart"]) <= 1) {
		unset($_SESSION["cart"]);
		header('location:cart.php');
		
	} else {
		unset($_SESSION["cart"]["$key"]);
		sort($_SESSION["cart"]);
		header('location:cart.php');
	
	}
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
				}
				header('location:cart.php');
			}
			
		}

//increment

if (isset($_POST['inc']) && $_POST['inc'] != "") {
		$key=$_POST['inc'];
	
		foreach ($_SESSION["cart"] as &$item) { 
            if ($item['prodname'] == $key){ 
				$item['quantity'] += 1;
				 header('location:cart.php');
			   
			   }
			}
			
		}


?>