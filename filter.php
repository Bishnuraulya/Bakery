<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "bakery_db");  
      $output = '';  
      $query = "  
           SELECT * FROM order_table
           WHERE order_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
		   ORDER BY order_id desc
      ";  
      $result = mysqli_query($connect, $query);  
    ?>  
          <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'>  
                               <th width="5%">ID</th>  
                               <th width="20%">Order_date</th>  
                               <th width="25%">Customer_name</th>
								<th width="25%">Items</th>  
								<th width="10%">Quantity</th>  
                               <th width="10%">Price</th>  
							     <th width="20%">Total</th>  
							   <th width="12%">Status</th>  
                               
                          </tr>  
            <?php  
					$total=0;
					$sum=0;
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                  
                   ?>
				   <tr>  
					 <td><?php echo $row["order_id"]; ?></td>  
                           <td><?php echo $row["Order_date"]; ?></td>  
                               <td><?php echo $row["Name"]; ?></td>  
							   <td><?php echo $row["Product_name"]; ?></td> 
                               <td><?php echo $row["Product_quantity"]; ?></td> 
								<td>RS:<?php echo $row["Product_price"]; ?></td> 
								<td> <?php echo number_format($row["Product_quantity"] * $row["Product_price"]);?></td>
								<td><?php echo $row["Order_status"]; ?></td> 
                               
                          </tr>  
						  <?php
							$total = $total + ($row["Product_quantity"] * $row["Product_price"]);
							 $sum=$sum +($row["Product_quantity"]);
						}
					?>
					<tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'>
						<td colspan="4" align="right"><b>Total</b></td>
						<td align="right">   <?php echo number_format($sum); ?></td>
						<td></td>
						<td colspan="1"> &#8360;:  <?php echo number_format($total); ?></td>
						<td></td>
                        <?php 
                       
                
           }  
      
 	  
      else{
	    
                 echo"<tr> "; 
                     echo"<td colspan='10'>" ;
					 echo "No Order Found"; echo"</td>  ";
                echo"</tr>";
             
                }
 }
   
 ?>
  </table>