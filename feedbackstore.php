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
                require 'header.php';
            ?>
            

            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h2><b>Product Entity</b></h2>
                        <form action="" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
                               Name: <input type="text" class="form-control" name="name" placeholder="Enter Name!" required="true">
                            </div> 
						<div class="form-group">
                           Address: <input type="text" class="form-control" name="address" placeholder="Enter Address!" 
							  required="true">
                            </div> 
							<div class="form-group">
                           Phone: <input type="number" class="form-control" name="phone" placeholder="Enter  Phone!" 
							  required="true">
                            </div> 
							<div class="form-group">
                          Email: <input type="email" class="form-control" name="email" placeholder="Enter Email" 
							  required="true">
                            </div> 
							<div class="form-group">
                          Message: <textarea cols="35" rows="5" class="form-control" name="msg" placeholder="Enter your feedbak!" 
						  
							  required="true"></textarea>
                            </div> 
			<input type="submit" name="send" value="Submit"/><br/>
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
   <?php
      if(isset($_POST['send']))
	  {
		  $name=$_POST['name'];
		  $address=$_POST['address'];
		  $cont=$_POST['phone'];
		  $email=$_POST['email'];
		  $msg=$_POST['msg'];
		$con = mysqli_connect("localhost","root","") or die("Connection Error");
		mysqli_query($con, "Create database if not exists bakery_db") or die("database creation error");
		mysqli_select_db($con, "bakery_db");
		$create = "create table if not exists Feedback (ID int primary key Auto_increment ,Name varchar(90),
	   Address varchar(80), Phone varchar(10),  Email varchar(80), Message varchar(1000))";
		mysqli_query($con, $create) or die("table creation error");
	$insert = "insert into feedback(Name, Address, Phone, Email, Message) values('$name','$address','$cont', '$email' , '$msg')";
	mysqli_query($con,$insert) or die("Insertion Error");
	echo "<center>";
	echo "Thanks for Your  Feedback! ";
	echo "</center>";
	}
?>
	  
     