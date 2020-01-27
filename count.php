
   
 <?php  
 $connect=mysqli_connect("localhost", "root", "", "bakery_db") or die("can not connect");
      $query="select Product_name, COUNT(Product_quantity) from order_table group by Product_name";
	   $result=Mysqli_query($connect, $query); 
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
                <h3 align="center">Sales Record:</h3>
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               
                               <th width="20%"> Items</th>  
							    <th width="20%">Sold Quantity</th>  
                             
                          </tr>  
                     <?php  
                     while($row =mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["Product_name"]; ?></td>   
                               
							   <td><?php echo $row["COUNT(Product_quantity)"]; ?></td>
								
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  

      </body>  
 </html>  
 