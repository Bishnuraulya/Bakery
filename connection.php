<?php
// $con=mysqli_connect("localhost","root","","shopping_db") or die(mysqli_error($con));

$con = mysqli_connect("localhost","root","") or die("Connection Error");
		mysqli_query($con, "Create database if not exists Bakery_db") or die("database creation error");
		mysqli_select_db($con, "Bakery_db");
		 echo "database created";
//$con=mysqli_connect("localhost","root","","st") or die(mysqli_error($con));
?>
