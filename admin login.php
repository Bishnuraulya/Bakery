
<!DOCTYPE html>
<html>
    <head>
        
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
	<?php
                require 'header.php';
            ?>
	
        <div>
            
            <br><br><br>
           <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login to view menu.</p>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" 
										placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="true">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" 
										placeholder="Password(min. 6 characters)" pattern=".{6,}" required="true">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit"  name="login" value="Login" class="btn btn-primary">
                                    </div>
									<?php
    // require 'connection.php';
	$con=mysqli_connect("localhost" ,"root", "")or die ("can not connect");
    session_start();
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		
		$password = md5($_POST['password']);
		
		$con = mysqli_connect("localhost","root", "") or die("Connection Error");
		mysqli_select_db( $con, 'bakery_db');
		$s= "select *from Admin where Email='$email' && Password='$password' ";
		// or die("Failed to query database()");
		$result=mysqli_query($con, $s);
		 $num=mysqli_num_rows($result);
		   if($num== 1)
		   {
			   header('location:admin menu.php');
		   }
		   else{
			   echo "<center>";
	echo "<h3>" ."You Are Not Authorized!";
	echo"</h3>";
	echo "</center>";
 
			   
		}
	}

?>
                                </form>
                            </div>
             
                        </div>
                    </div>
                </div>
           </div>
           <br><br><br><br><br>
           <footer class="footer">
               <div class="container">
                <center>
                   <p>This website is developed by Bishnu  Raulya</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
