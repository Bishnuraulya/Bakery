
<?php
    // require 'connection.php';
    session_start();
   
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
                require 'header3.php';
            ?>
            

            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h2><b>Product Entity</b></h2>
                        <form method="post" action="">
                            <div class="form-group">
                              Product ID: <input type="text" class="form-control" name="id" placeholder="ID" required="true">
                            </div> 
                            <div class="form-group">
                              Product Name: <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div> 
							 <div class="form-group">
                              Product Image: <input type="file" class="form-control" name="profilePic" placeholder="Name" required="true">
                            </div> 
                            
							<div class="form-group">
                               Product Price <input type="text" class="form-control" name="price" placeholder="Price" required="true">
                            </div> 
                            
                            <div class="form-group">
							Catgory:<select name="cat">
			<option value="cake">Cake</option>
			<option value="cookies">Cookies</option>
			<option value="bread">Bread</option>
			</div>  
			
                            <div class="form-group">
                                <input type="submit" name="register" class="btn btn-primary" value="Insert">
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

	if(isset($_POST['register']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$filename = $_FILES['profilePic']['name'];
		$price = $_POST['price'];
		$catgory = $_POST['cat'];
		move_uploaded_file($_FILES['profilePic']['tmp_name'],$filename);
		$con = mysqli_connect("localhost","root","") or die("Connection Error");
		mysqli_query($con, "Create database if not exists bakery_db") or die("database creation error");
		mysqli_select_db($con, "bakery_db");
		$create = "create table if not exists products1 (ID int primary key auto increment, Name varchar(255),
	   Image varchar(40), Price varchar(10), Catgory varchar(40))";
		mysqli_query($con, $create) or die("table creation error");
	$insert = "insert into products1 values( '$id', '$name','$filename','$price',  '$catgory' )";
	mysqli_query($con,$insert) or die("Insertion Error");
	echo "<center>";
	echo "Insertion Successfull! <a href='#' target='_blank'>Go to Login Page</a>";
	echo "</center>";
	}
?>