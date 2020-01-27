<?php  
$connect = mysqli_connect("localhost", "root", "", "bakery_db");  
 $query = "SELECT * FROM order_table ORDER BY order_id desc";  
 $result = mysqli_query($connect, $query);  
 
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
                <h3 align="center">Order Data</h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="View" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
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
					 $total =0;
					 $sum=0;
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
                               
                          </tr >  
						  <?php
							$total = $total + ($row["Product_quantity"] * $row["Product_price"]);
							$sum = $sum + ($row["Product_quantity"] );
						}
					?>
					  <tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'>
						<td colspan="4" align="right"><b>Total</b></td>
						<td align="right">  <?php echo number_format($sum); ?></td>
						<td></td>
						<td colspan="1"> &#8360;:  <?php echo number_format($total); ?></td>
						
						<td colspan="1"> </td>
                      </tr>
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
