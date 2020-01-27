
<?php
    $con=mysqli_connect("localhost" , "root", "", "bakery_db")or die("can not connect ro database");
    //require 'header.php';
    session_start();
      $create="create table user_order( ID int primary key, User_ID int primary key, status enum('Added to cart','Confirmed')
	  NOT NULL)";
		 mysqli_query($con, $create) or die("table creation error");
    $add_to_cart_query="insert into items(user_id,item_id,status) values ('$id','$item_name','Added to cart')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: products.php');
?>