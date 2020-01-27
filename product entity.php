<?php
session_start();
   $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
   $query="Select * from products order by ID desc limit 1";
   $result=mysqli_query($con, $query);
   $row=mysqli_fetch_array($result);
   // $result=mysqli_query($con, $query);
      // $num_rows=mysqli_num_rows($result);
   $lastid=$row['ID'];
    if($lastid == " ")
	{
		$pid="PID1";
	}
	 else{
		 $pid=substr($lastid, 3);
		 $pid=intval($pid);
		 $pid="PID".($pid +'1');
		 
	 }
    
  ?>
  <?php
    
	if($_SERVER["REQUEST_METHOD"]== "POST")
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$filename = $_FILES['profilePic']['name'];
		$price = $_POST['price'];
		$qty = $_POST['qty'];
		
		$catgory = $_POST['cat'];
		move_uploaded_file($_FILES['profilePic']['tmp_name'],$filename);
		$con = mysqli_connect("localhost","root","") or die("Connection Error");
		mysqli_query($con, "Create database if not exists bakery_db") or die("database creation error");
		mysqli_select_db($con, "bakery_db");
		$create = "create table if not exists products (ID varchar(255) primary key ,Name varchar(255),
	   Image varchar(40), Price varchar(10), Quantity varchar(100),  Category varchar(40))";
		mysqli_query($con, $create) or die("table creation error");
	$insert = "insert into products(ID, Name, Image, Price, Quantity , Category) values( '$id', '$name','$filename','$price','$qty', '$catgory' )";
	mysqli_query($con,$insert) or die("Insertion Error");
	//$update="UPDATE Products   SET Quantity=Quantity-1 where Name='$name'" ;
	echo "<center>";
	echo "Insertion Successfull! ";
	echo "</center>";
	}
?>
<!DOCTYPE html>
<html>
    <head>
        
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
                require 'header4.php';
            ?>
            

            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h2><b>Product Entity</b></h2>
                        <form action="<?php echo($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                              Product ID: <input type="text" class="form-control" name="id"  id="id" value="<?php echo $pid;?>" readonly>
                            </div> 
                            <div class="form-group">
                              Product Name: <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div> 
						<div class="form-group">
                              Product Image: <input type="file" class="form-control" name="profilePic" placeholder="Image" 
							  required="true">
                            </div> 
							<div class="form-group">
                              Product Price: <input type="text" class="form-control" name="price" placeholder="Price" 
							  required="true">
                            </div> 
							<div class="form-group">
                              Product Quantity: <input type="number" class="form-control" name="qty" placeholder="Quantity" 
							  required="true">
                            </div> 
							
		<div class="form-group">
			Category:<select name="cat">
			<option value="cake">Cake</option>
			<option value="cookies">Cookies</option>
			<option value="bread">Bread</option>
			</select><br><br>
			</div>
			<input type="submit" value="Submit"/><br/>
		</form></div>
		</center>
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
 
