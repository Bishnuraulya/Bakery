<?php
	 $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection faled");
	  mysqli_select_db($con,'bakery_db');
		$sql= "DELETE * FROM Order_table WHERE ID='.$_GET[id]' ";

	     if(mysqli_query($con, $sql))
		 {
	     	header("refresh:1 ; url=view product.php");
		 }
	     	else
			{
				
					echo "Not Deleted";
			}
	    ?>