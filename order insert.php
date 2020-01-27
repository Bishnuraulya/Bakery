

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Projectworlds Store</title>
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
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <form method="post" action="user_registration_script.php">
                        
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div> 
							<div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Address" required="true">
                            </div> 
                            <div class="form-group"> 
                                <input type="number" class="form-control" name="contact" placeholder="Contact" 
								required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Conform">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
                <center>
                   <p>This website is developed by Bishnu Raulya</p>
               </center>
               </div>
           </footer>

        </div>
    </body>
</html>
<?php
    require 'connection.php';
    session_start();
	if(isset($_POST['Conform'])){
$connect = mysqli_connect("localhost","root", "", "bakery_db") or die("Connection Error");
// $create="create table order1_table (order_id int , Id int  primary key, order_date date, product_name varchar(50), 
 // product_price int(10), product_quantity int(50), order_status varchar(50))";
  // mysqli_query($connect, $create)or die("table creation error");
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Making Cart</title>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Online Bakery</title>
       <!-- <meta charset="UTF-8">-->
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
           <br />  
           <div class="container" style="width:800px;">  
                <?php  
				 
 
                if(isset($_POST["place_order"]))  
					
                {   foreach($_SESSION["booking"] as $keys => $values)  
                     { 
					 $customer_details = '';  
                     $order_details = '';  
				   $order_details .= "  
                     INSERT INTO order1_table(order_id, Id,order_date, product_name, product_price, product_quantity
					 
					 , order_status)  
                     VALUES( '3', '3', '".date('Y-m-d')."',  '".$values["item_name"]."', '".$values["item_price"]."', 
						  '".$values["item_quantity"]."', 'pending')"; 
					 }						  
                      $order_id = "";  
                     if(mysqli_query($connect, $order_details))  
                     {  
                          $order_id = mysqli_insert_id($connect);  
                     }  
                     $_SESSION["order_id"] = $order_id;  
                     // $order_details = "";  
                     
                          // $order_details .= "  
                          // INSERT INTO tbl_order_details(Order_id, Product_Name, Product_Price, Product_Quantity)  
                          // VALUES('".$order_id."', '".$values["item_name"]."', '".$values["item_price"]."', 
						  // '".$values["item_quantity"]."');  
                          // ";  
                     // }  
                     if(mysqli_multi_query($connect, $order_details))  
                     {  
                          unset($_SESSION["booking"]);  
                          echo '<script>alert("You have successfully place an order...Thank you")</script>';  
                          echo '<script>window.location.href="caartt.php"</script>';  
                     }  
                }  
                if(isset($_SESSION["order_id"]))  
                {  
                     $customer_details = '';  
                     $order_details = '';  
                     $total = 0;  
                     $query = '  
                     SELECT * FROM order1_table
					  INNER JOIN  registration  
                     ON  registration.ID = order1_table.ID
                     WHERE order1_table.Order_id = "'.$_SESSION["order_id"].'"  
                     ';  
					    
                     
                  
                                 $result = mysqli_query($connect, $query);
								 
								if(mysqli_num_rows($result)>0)
								{
                     		while($row = mysqli_fetch_array($result))  
                          ?>
						  <?php
						  $customer_details ='   
                            <b>'.$row["Name"].'</b> 
                          <p>'.$row["Address"].'</p>  
                          <p>'.$row["Contact"].'</p>  
                          <p>'.$row["Email"].'</p> ';  
                          $order_details .= "  
                               <tr>  
              <td>".$values["item_name"]."</td>  
          <td>".$values["item_quantity"]."</td>  
             <td>".$values["item_price"]."</td>  
             <td>".number_format($values["item_quantity"] * $values["item_price"], 2)."</td>  
                               </tr>  
                          ";  
                          $total =$total+($values["item_quantity"] * $values["item_price"]); 
                     
					 }
				
                     echo '
                     <h3 align="center">Order Summary for Order No.'.$_SESSION["order_id"].'</h3>  
                     <div class="table-responsive">  
                          <table class="table">  
                               <tr>  
                                    <td><label>Customer Details</label></td>  
                               </tr>  
                               <tr>  
                                    <td>'.$customer_details.'</td>  
                               </tr>  
                               <tr>  
                                    <td><label>Order Details</label></td>  
                               </tr>  
                               <tr>  
                                    <td>  
                                         <table class="table table-bordered">  
                                              <tr>  
                                                   <th width="50%">Product Name</th>  
                                                   <th width="15%">Quantity</th>  
                                                   <th width="15%">Price</th>  
                                                   <th width="20%">Total</th>  
                                              </tr>  
                       '.$order_details.'  
                                              <tr>  
                   <td colspan="3" align="right"><label>Total</label></td>  
                     <td>'.number_format($total, 2).'</td>  
                                              </tr>  
                                         </table>  
                                    </td>  
                               </tr>  
                          </table>  
                     </div>  
				
				'; 
				}
				}
                ?>
           </div>  
      </body>  
 </html> 