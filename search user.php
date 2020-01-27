<?php  
 $output = '';  
  if(isset($_POST['search'])){
	 $connect=mysqli_connect("localhost", "root", "", "bakery_db") or die("can not connect");
        $name=$_POST['name'];
				$query = "SELECT * FROM order_table WHERE  Name LIKE '%".$name."%'"; 
				$result = mysqli_query($connect, $query); 
  }
  
 ?>  
 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>DatePicker</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
           <?php
    require 'header4.php';
?>	
           <div class="container" style="width:1000px;">  
                <h3 align="center">User Information:</h3>
				<center>
   <form action="search user.php" method="post">
    <input type="hidden" name="search" value="true">
    <input type ="text" name="name" placeholder="Search User!">
    <input type="submit"  name="search" style="margin-top:5px" class="btn btn-info" value="Search"  />
	
	</center>
    </form>
                <br />  
                <div id="order_table"> 
       				
                     <table class="table table-bordered">  
                          <tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'>  
                               <th width="5%" >ID</th>  
							   <th width="20%">Date</th>  
                               <th width="20%">Name</th>  
							   
							   <th width="20%">Items</th>  
							   <th width="20%">Quantity</th> 
							   <th width="20%">Price</th> 
								<th width="20%">status</th>  							   
							    <th width="20%">Address</th>  
                               <th width="15%">Contact</th>
								<th width="35%">Email</th>
                               
                          </tr> 
                     <?php  
					 $total=0;
					 $sum=0;
					  if(mysqli_num_rows($result) > 0)  
      {  
                     while($row =mysqli_fetch_array($result))  
                     {  
                     ?>  
                         
						 <tr>  
                               <td><?php echo $row["order_id"]; ?></td>   
							    <td><?php echo $row["Order_date"]; ?></td>   
                               <td><?php echo $row["Name"]; ?></td> 
									 <td><?php echo $row["Product_name"]; ?></td>
										 <td><?php echo $row["Product_quantity"]; ?></td>
										
							<td><?php echo $row["Product_price"]; ?></td>										 
											 <td><?php echo $row["Order_status"]; ?></td>   
							   <td><?php echo $row["Address"]; ?></td> 
                               <td><?php echo $row["Cont_Number"]; ?></td> 
								<td><?php echo $row["Email"]; ?></td> 
								 
                          </tr>  
						   <?php
							$total =$total+($row["Product_quantity"] );
							$sum =$sum+($row["Product_price"] );
						}
					?>
					<tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'>
					
						<td colspan="4" align="right"><b>Total</b></td>
						<td align="right">  <?php echo number_format($total); ?></td>
						<td align="right"> &#8360;:  <?php echo number_format($sum); ?></td>
						<td colspan="5"> </td>
                     <?php  
                     }
	  
							else{
	    
                 echo"<tr> "; 
                     echo"<td colspan='10'>" ;
					 echo "No User Found"; echo"</td>  ";
                echo"</tr>";
             
                }
                     ?>  
                     </table>  
                </div>  
           </div> 
</div>		   
		   
      </body>  
 </html>  
 