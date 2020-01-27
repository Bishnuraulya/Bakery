<?php
	if(isset($_POST['addcart']))
	{
		
		$con = mysqli_connect("localhost","root","") or die("Connection Error");
		mysqli_query($con, "Create database if not exists bakery_db") or die("database creation error");
		mysqli_select_db($con, "bakery_db");
		$create = "create table if not exists products (ID int primary key Auto_increment ,Name varchar(255),
	   Image varchar(40), Price varchar(10), Quantity varchar(100),  Category varchar(40))";
		mysqli_query($con, $create) or die("table creation error");
	$insert = "insert into products(Name, Image, Price, Quantity , Category) values('$name','$filename','$price','$qty', '$catgory' )";
	mysqli_query($con,$insert) or die("Insertion Error");
	$update="UPDATE Products   SET Quantity=Quantity-1 where Name='$name'" ;
	echo "<center>";
	echo "Insertion Successfull! ";
	echo "</center>";
	}
?>