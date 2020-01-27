<?php  
 //cart.php  
 session_start();  

$connect = mysqli_connect("localhost","root", "", "bakery_db") or die("Connection Error");
 
$create="create table order1_table (order_id int , Id  primary key, order_date date, product_name varchar(50), 
 product_price int(10), product_quantity int(50), order_status varchar(50))";
  mysqli_query($connect, $create)or die("table creation error");
  echo "table cteate success";
 ?>  