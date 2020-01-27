
	  <?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Online Bakery</title>
       <!-- <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
		<style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
    </style>
    </head>
    <body>
		
        <div>
           
           
               
         
                  <nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   
                      
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           
						  
					 <a href="" class="navbar-brand" align="left">Online Bakery Shop</a>
						   
						   <li><a href="view product.php"> <span class="glyphicon glyphicon-eye-open"></span>View Product</a></li>
						    <li><a href="datepick.php"> <span class="glyphicon glyphicon-eye-open"></span>Sales</a></li>
							 <li><a href="userinfo.php"> <span class="glyphicon glyphicon-eye-open"></span>Users</a></li>
						   <li><a href="product entity.php"><span class="glyphicon glyphicon-plus"></span>Add Product</a></li>
						   <li><a href="view order.php"><span class="glyphicon glyphicon-eye-open"></span>View orders</a></li>
						    <li><a href="view feedback.php"><span class="glyphicon glyphicon-eye-open"></span>View Feedback</a></li>
						   <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                           
                           
                           
                       </ul>
                   </div>
               </div>
			  
			   
			   <br>
              <div class="container">
                     <div class="col-xs-2">
                       <div class="thumbnail" style="border:1px solid #333; background-color:maganta; border-radius:5px; padding:16px;" align="center">
             
                           <center>
                               <div class="caption">
                                   <p id="autoResize"> Products:</p>
								    <?php
     $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
      $query="SELECT * FROM products  order by ID desc "; 
	  
      $result=mysqli_query($con, $query) or die("can not display");
      $num_rows=mysqli_num_rows($result);
	  echo"<center>";
	   echo"<h4>". "Total :"."$num_rows"."</h4>";
	    ?>

                               </div>
                           </center>
                       </div>
                   </div>
				  
		   <div class="col-xs-2">
                       <div class="thumbnail" style="border:1px solid #333; background-color:maganta; border-radius:5px; padding:16px;" align="center">
             
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Sold:</p>
								    <?php
     $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
      $query="SELECT * FROM order_table where Order_status='Confirmed'  "; 
	 
	  
      $result=mysqli_query($con, $query) or die("can not display");
      $num_rows=mysqli_num_rows($result);
	  echo"<center>";
	   echo"<h4>". "Total :"."$num_rows"."</h4>";
	    ?>

                               </div>
                           </center>
                       </div>
                   </div>
				    <div class="col-xs-2">
                       <div class="thumbnail" style="border:1px solid #333; background-color:maganta; border-radius:5px; padding:16px;" align="center">
             
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Pending:</p>
								    <?php
     $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
      $query="SELECT * FROM order_table where Order_status='Pending'  "; 
	  // $query="SELECT * FROM order_table  order by order_id desc  
     // where Order_status =Pending	 "; 
	  
      $result=mysqli_query($con, $query) or die("can not display");
      $num_rows=mysqli_num_rows($result);
	  echo"<center>";
	   echo"<h4>". "Total :"."$num_rows"."</h4>";
	    ?>

                               </div>
                           </center>
                       </div>
                   </div>
				   <div class="col-xs-2">
                       <div class="thumbnail" style="border:1px solid #333; background-color:maganta; border-radius:5px; padding:16px;" align="center">
             
                           <center>
                               <div class="caption">
                                   <p id="autoResize"> Profit:</p>
								    <?php
     $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
      $query="SELECT * FROM order_table  order by order_id desc "; 
	  // $query="SELECT * FROM order_table  order by order_id desc  
     // where Order_status =Delivered	 "; 
	  
      $result=mysqli_query($con, $query) or die("can not display");
      
	    ?>
                     <?php  
					 $connect = mysqli_connect("localhost", "root", "", "bakery_db");  
 $query = "SELECT * FROM order_table ORDER BY order_id desc";  
 $result = mysqli_query($connect, $query);  
					 $total =0;
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                     
						  <?php
							$total = $total + ($row["Product_quantity"] * $row["Product_price"]);
						}
					?>
					
					
						<td align="right"> &#8360;:  <?php echo number_format($total); ?></td>
                    
                      
            
                               </div>
                           </center>
                       </div>
                   
				    
                   </div>
				   				    <div class="col-xs-2">
                       <div class="thumbnail" style="border:1px solid #333; background-color:maganta; border-radius:5px; padding:16px;" align="center">
             
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Visitors:</p>
								    <?php
     $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
     $query="SELECT * FROM order_table  where Name='Bishnu Raulya' "; 
	  
      $result=mysqli_query($con, $query) or die("can not display");
      $num_rows=mysqli_num_rows($result);
	  echo"<center>";
	   echo"<h4>". " Total:"."$num_rows"."</h4>";
	    ?>

                               </div>
                           </center>
                       </div>
                   </div>
				    <div class="col-xs-2">
                       <div class="thumbnail" style="border:1px solid #333; background-color:maganta; border-radius:5px; padding:16px;" align="center">
             
                           <center>
                               <div class="caption">
                                   <p id="autoResize" ><a href="count.php">Sales Status:</p></a>
								    <?php
								
	    ?>

                               </div>
                           </center>
                       </div>
                   </div>
				   </div>
				   </nav>
				   <?php

$query = "SELECT * FROM order_table";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ Month:'".$row["Order_date"]."', profit:".$row["Product_price"] * $row["Product_quantity"].",
 sale:".$row["Product_quantity"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
 
  <div class="container" style="width:1200px;">
   <h3 align="center">Daily Purchase and Sale Data</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Month',
 ykeys:['profit',  'sale'],
 labels:['Profit',    'Sale'],
 hideHover:'auto',
 stacked:true
});
</script> 
<br><br>

           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>This website is developed by Bishnu Raulya </p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
	
   
  
   
	