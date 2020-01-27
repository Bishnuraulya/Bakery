<!DOCTYPE html>
<html>
<head>
	<title>Update the value</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">

</head>
<body>
 <?php require 'header3.php';
 ?>
	
	  	<?php
     $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
      $query="SELECT * FROM order_table order by order_id desc "; 
      $result=mysqli_query($con, $query) or die("can not display");
      $num_rows=mysqli_num_rows($result);
	  echo "<center>";
		                     echo '
                    
                     <div class="table-responsive">  
                          <table class="table">  
                              
                               <tr style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px">  
                                    <td align="center"><label>Order Details</label></td>  
                               </tr>  
                               <tr>  
                                    <td>  
                                         <table class="table table-bordered">  
                                              <tr style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px">  
                                                   <th width="5%">Order_ID</th> 
												    <th width="5%">Ordered_date</th> 
												   <th width="20%">Product</th>
												   <th width="10%">Price</th>
                                                   <th width="5%">Quantity</th>  
                                                   <th width="10%">Order_Status</th>  
                                                   <th width="20%">Name</th> 
												    <th width="15%">Address</th> 
                                                   <th width="10%">Cont_Number</th> 
												   <th width="20%">Email</th> 
                                                   <th width="10%">Action</th>  
												   
												   
                                              </tr>  ';
          while($row=mysqli_fetch_assoc($result))
          {
			   echo "<center>";
          	
	  	 echo"<tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'><form action=updateorder.php method=post>";
		 echo"<td><input type=text size=2  name=id value='".$row['order_id']."'></td>";
	  	echo "<td>".$row['Order_date']. "</td>";
	  	 echo "<td>".$row['Product_name']. "</td>";
		 echo "<td>".$row['Product_price']. "</td>";
		echo "<td>".$row['Product_quantity']. "</td>";
		   echo"<td><input type=text  size=10  name=status value='".$row['Order_status']."'></td>";
	  	echo "<td>".$row['Name']. "</td>";
			echo "<td>".$row['Address']. "</td>";
			echo "<td>".$row['Cont_Number']. "</td>";
          	echo "<td>".$row['Email']. "</td>";
	  	echo"<td> <form action='' method='post'> <input type='submit' name='submit' class='btn-sm btn-danger' value='Update'>
			  </form> ";
		
	  	 echo"</form>";
    			 echo"</tr>";

	  	 }
	  		?>
			           <footer class="footer">
               <div class="container">
                <center>
                   <p>This website is developed by Bishnu Raulya</p>
               </center>
               </div>
           </footer>
	  </body>
	  </html>
	  