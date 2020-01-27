<?php
  $filename = $_FILES['profilePic']['name'];
	 $con=mysqli_connect("localhost", "root", "") or die("connection faled");
	  mysqli_select_db($con,'bakery_db');
	   // if($filename=="")
	   // {
		   
		   // $sql= "UPDATE products SET  Name='$_POST[name]',  Price='$_POST[price]', Quantity='$_POST[qty]',
	    // Category='$_POST[cat]' 
	   // WHERE ID='$_POST[id]'";
	   // }
	   // else{
		$sql= "UPDATE products SET  Name='$_POST[name]', Image='$_POST[profilePic]', Price='$_POST[price]', Quantity='$_POST[qty]',
	    Category='$_POST[cat]' 
	   WHERE ID='$_POST[id]'";
	     if(mysqli_query($con, $sql))
	     	header("refresh:1 ; url=update.php");
	     	else
	     		echo "Not Updated";
	   
	    ?>