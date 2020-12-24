<?php
$conn=mysqli_connect('localhost','root');
if($conn){
    
    if(mysqli_select_db($conn,'login')){
        
    //register table
        $reg= mysqli_query($conn,"SELECT * FROM information_schema.tables WHERE table_schema='login' AND table_name='register'");        
        $regc =mysqli_num_rows($reg);
       
        if($regc == 0){
            $sql = "CREATE TABLE `register`(`srno` INT AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(22), `username` VARCHAR(20), `email` VARCHAR(20), `password` VARCHAR(20), `countrycode` INT(3), `mobile` BIGINT)";
            $tbc = mysqli_query($conn,$sql);
            if($tbc){
                printf("Register Table Created");
            }
            else{
                printf("Error While Creating 'register' table! Please check connection or try again");
            }
        }
    
    //cart table
        $cart= mysqli_query($conn,"SELECT * FROM information_schema.tables WHERE table_schema='login' AND table_name='cart'");        
        $cartc =mysqli_num_rows($cart);
       
        if($cartc == 0){
            $sql = "CREATE TABLE `Cart`(`srno` INT AUTO_INCREMENT PRIMARY KEY, `username` VARCHAR(20), `Name` VARCHAR(20), `ProductName` VARCHAR(20), `Price` INT, `Quantity` INT, `Total Price` INT)";
            $tbc = mysqli_query($conn,$sql);
            if($tbc){
                printf("Cart Table Created");
            }
            else{
                printf("Error While Creating 'cart' table! Please check connection or try again");
            }
        }


    }else{
        $sql = "CREATE DATABASE login";
        $dbc = mysqli_query($conn, $sql);
        if($dbc){
            printf("Database Created");
			mysqli_select_db($conn,'login');
        }

        //register table
        $reg= mysqli_query($conn,"SELECT * FROM information_schema.tables WHERE table_schema='login' AND table_name='register'");        
        $regc =mysqli_num_rows($reg);
       
        if($regc == 0){
            $sql = "CREATE TABLE `register`(`srno` INT AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(22), `username` VARCHAR(20), `email` VARCHAR(20), `password` VARCHAR(20), `countrycode` INT(3), `mobile` BIGINT)";
            $tbc = mysqli_query($conn,$sql);
            if($tbc){
                printf("Register Table Created");
            }
            else{
                printf("Error While Creating 'register' table! Please check connection or try again");
            }
        }
    
    //cart table
        $cart= mysqli_query($conn,"SELECT * FROM information_schema.tables WHERE table_schema='login' AND table_name='cart'");        
        $cartc =mysqli_num_rows($cart);
       
        if($cartc == 0){
            $sql = "CREATE TABLE `Cart`(`srno` INT AUTO_INCREMENT PRIMARY KEY, `username` VARCHAR(20), `Name` VARCHAR(20), `ProductName` VARCHAR(20), `Price` INT, `Quantity` INT, `Total Price` INT)";
            $tbc = mysqli_query($conn,$sql);
            if($tbc){
                printf("Cart Table Created");
            }
            else{
                printf("Error While Creating 'cart' table! Please check connection or try again");
            }
        }

    }
        
}else{
    printf("Connection Problem");
}
?>