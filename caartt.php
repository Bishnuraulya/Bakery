 <?php  
				 
				session_start();  
				
		$connect = mysqli_connect("localhost","root", "", "bakery_db") or die("Connection Error");
		$create="create table if not exists order_table(order_id int primary key  Auto_increment ,Order_date date, Product_name varchar(50), 
							Product_price int(10), Product_quantity int(50), Order_status varchar(50), Name varchar(50), 
							Address varchar(50), Cont_Number varchar(10), Email varchar(200), Time varchar(50))";
   mysqli_query($connect, $create)or die("table creation error");
    ?>

<!DOCTYPE html>  
 <html>   
      <head>  
           <title>Making Cart</title>
        <!--<link rel="shortcut icon" href="img/lifestyleStore.png" />-->
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
	  <?php
	  require 'header.php';
	  ?>
	   <center><h3>Order Details</h3></center>
	 
           <br />  
           <div class="container" style="width:800px;">  
		   <?php

              
					
                if(isset($_POST["place_order"]))  
				{
		
				 $name =$_POST['name'];
		 $address =$_POST['address'];
		$contact = $_POST['number'];
		$email = $_POST['email'];
		$time=$_POST['time'];
      
	$con = mysqli_connect("localhost","root","") or die("Connection Error");
		mysqli_query($con, "Create database if not exists bakery_db") or die("database creation error");
		mysqli_select_db($con, "bakery_db");
	
	
                    foreach($_SESSION["booking"] as $keys => $values)  
                     { 
					 
                    
				   $order_details= "  ";
				   $order_id = ""; 
				   
				  // $order_id = mysqli_insert_id();  
                    mysqli_query( $connect,  "INSERT INTO order_table(Order_date, Product_name, Product_price, Product_quantity
					 
					 , Order_status, Name, Address, Cont_Number, Email, Time)  
                     VALUES('".date('Y-m-d')."',  '".$values["item_name"]."', '".$values["item_price"]."', 
						  '".$values["item_quantity"]."', 'Pending', '$name', '$address', '$contact', '$email', '$time')"); 
					 }						  
                       
            
                       
                     
                          unset($_SESSION["booking"]);  
                          echo '<script>alert("You have successfully place an order...Thank you")</script>';  
                          echo '<script>window.location.href="index.php"</script>';  
				}
				
                ?>
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