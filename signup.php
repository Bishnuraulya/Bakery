<?php
    require 'connection.php';
    session_start();
    if(isset($_SESSION['email'])){
        header('location:caartt.php');
    }
?>

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
                        <h1><b>SIGN UP</b></h1>
                        <form method="post" action="user_registration_script.php">
                            <div class="form-group">
                                <input type="number" class="form-control" name="id" placeholder="ID" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div> 
							 
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true" pattern=".{6,}">
                            </div>
							<div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Address" required="true">
                            </div> 
                            <div class="form-group"> 
                                <input type="number" class="form-control" name="contact" placeholder="Contact" 
								required="true">
                            </div>
                            <div class="form-group">
                                Gender:<input type="radio" name="gender" value="male">Male
								<input type="radio" name="gender" value="female">Female<br><br>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Sign Up">
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
	if(isset($_POST['Sign Up'])){
	$id= mysqli_real_escape_string($con,$_POST['id']);
    $name= mysqli_real_escape_string($con,$_POST['name']);
   
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
	 
    $cont=mysqli_real_escape_string($con,$_POST['contact']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    
	$gender=mysqli_real_escape_string($con,$_POST['gender']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo "Incorrect email. Redirecting you back to registration page...";
	}
    $duplicate_user_query="select id from registration where email='$email'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);
    if($rows_fetched>0){
        //duplicate registration
        //header('location: signup.php');
        ?>
        <script>
            window.alert("Email already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }else{
        $user_registration_query="insert into registration( id, name,password ,address,contact, gender,email) values 
		('$id','$name','$password','$address','$cont', '$gender','$email' )";
        //die($user_registration_query);
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        echo "User successfully registered";
        $_SESSION['Email']=$email;
        //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
        $_SESSION['ID']=mysqli_insert_id($con); 
        //header('location: products.php');  //for redirecting
        ?>
        <meta http-equiv="refresh" content="3;url=products.php" />
        <?php
    }
    }
?>
