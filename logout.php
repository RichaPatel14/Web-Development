<?php
   	if(!isset($_SESSION)){ 
	    session_start(); 
	}

	if(!isset($_SESSION['login_user'])){
      header("location:Verify.html");
      die();	
	}
	 
	$usr=$_SESSION['login_user'];
	$conn=mysqli_connect('localhost','root','','login');
	$q="SELECT * FROM `Cart` WHERE `username`='$usr'";
	$results=mysqli_query($conn,$q);
	$numb=mysqli_num_rows($results); $numbs=$numb;

	if(!isset($_SESSION['cart'])||count($_SESSION['cart'])<1){	
		session_unset();
   		if(session_destroy()) {
      		header("Location:Verify.html");
   		}

	}else{
		foreach((array)$_SESSION['cart'] as $products){
			$Name=$products['name'];
			$Quantity=$products['quantity'];
			$Price=$products['price'];
			$ProductName=$products['prodname'];
			$TotalPrice=($Price*$Quantity);
			 
			 
			 
//finalize database according to session(cart)
			 
			 
			$id=array();
			while($numb>0){
				while($row=mysqli_fetch_array($results)){
					$id[$numb]=$row['ProductName'];
				
					break;
				}
				$numb--;
			}
			for($i=1;$i<=count($id);$i++){
				while($ProductName!==$id[$i]){
					$del="Delete FROM `Cart` WHERE `ProductName`='$id[$i]' && `username`='$usr'";
					mysqli_query($conn,$del);
					break;
						
				}
			}
			
		
		
//If product is not found in databse 
			 $check="SELECT * FROM `Cart` WHERE `ProductName`='$ProductName' && `username`='$usr'";
			 $result=mysqli_query($conn,$check);
			 $num=mysqli_num_rows($result);

			 if($num==1){
				
				continue;
			 }
			
			 
			 $insert="INSERT  INTO `Cart` (`username`,`Name`,`ProductName`, `Price`, `Quantity`, `Total Price`) VALUES ('$usr','$Name', '$ProductName', '$Price', '$Quantity', '$TotalPrice')";
			mysqli_query($conn,$insert);
		
			 		
		 }
		if(isset($_POST['checkout'])&& $_POST['checkout']!=""){
			header("location:cart.php");
		}else{
		session_unset();
		header("Location:Verify.html");
		}
	}


?>
