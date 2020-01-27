<?php  
 $output = '';  
  // if(isset($_POST['search'])){
	 $connect=mysqli_connect("localhost", "root", "", "bakery_db") or die("can not connect");
        //$name=$_POST['name'];
				// $query ="SELECT order_table.order_id, Order_table.Order_date, order_table.Product_name, order_table.Product_quantity, products.Category          
// FROM  pruducts
// INNER JOIN order_table        
// ON products.order_id=order_table.ID  ";      
  $query ="SELECT order_table.Product_name, products.Name 
 from products innerjoin order_table on 
 products.ID=order_table.Product_id";  
  
// WHERE  order_table.Product_price=300 ";
  //$query="select * from order_table INNER JOIN products ON order_table.order_id=products.order_id";
    $result = mysqli_query($connect, $query); 
  //}
  
  
 ?>  
 
