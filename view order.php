
<!DOCTYPE html>
<html>
    <head>
        <title>Online Bakery</title>
       <!-- <meta charset="UTF-8">
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
        
           
<?php
            require 'header4.php';
           ?>
    <?php
     $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
      $query="SELECT * FROM order_table  order by order_id desc "; 
	  // $query="SELECT * FROM order_table  order by order_id desc  
     // where Order_status =Delivered	 "; 
	  
      $result=mysqli_query($con, $query) or die("can not display");
      
	   
		                     echo '
                    
                     <div class="table-responsive">  
                          <table class="table">  
                              
                              
                               <tr style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px">  
                                    <td>  
                                         <table class="table table-bordered">  
                                              <tr style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px" >  
                                                   <th width="10%">Order_ID</th> 
												    <th width="15%">Order_date</th> 
												   <th width="20%">Product_Name</th>
												   <th width="10%">Product_Price</th>
                                                   <th width="10%">Quantity</th>  
                                                   <th width="15%">Order_Status</th>  
                                                   <th width="20%">Name</th> 
												    <th width="20%">Address</th> 
                                                   <th width="20%">Cont_Number</th> 
												   <th width="20%">Email</th> 
												   <th width="20%">Time</th> 
                                                   <th width="20%">Action</th>  
												   
												   
                                              </tr>  ';
          while($row=mysqli_fetch_assoc($result))
          {
			  echo "<center>";
          	echo"<tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'>";
          	
			echo "<td>".$row['order_id']. "</td>";
			echo "<td>".$row['Order_date']. "</td>";
          	echo "<td>".$row['Product_name']. "</td>";
			echo "<td>".$row['Product_price']. "</td>";
			echo "<td>".$row['Product_quantity']. "</td>";
			echo "<td>".$row['Order_status']. "</td>";
			echo "<td>".$row['Name']. "</td>";
			echo "<td>".$row['Address']. "</td>";
			echo "<td>".$row['Cont_Number']. "</td>";
          	echo "<td>".$row['Email']. "</td>";
			echo "<td>".$row['Time']. "</td>";
          	 echo"<td> <form action='update orders.php' method='post'> <input type='submit' name='submit' class='btn-sm btn-danger' value='Update'>
			  </form> ";
          	 echo"</td></tr>";
			 
			 echo "</center>";
			
          }
 
  ?>
    </table>
	 

        </div>
		<br>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>This website is developed by Bishnu Raulya </p>
               </center>
               </div>
           </footer> 
  </body>
</html>