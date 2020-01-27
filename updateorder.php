<?php
	 $con=mysqli_connect("localhost", "root", "") or die("connection faled");
	  mysqli_select_db($con,'bakery_db');
		$sql= "UPDATE order_table SET  Order_status='$_POST[status]'
	   WHERE Order_id='$_POST[id]'";
	    
	     if(mysqli_query($con, $sql))
	     	header("refresh:1 ; url=update orders.php");
	     	else
	     		echo "Not Updated";
	    ?>