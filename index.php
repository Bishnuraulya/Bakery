<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Online Bakery</title>
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
          <div id="bannerImage">
              <div class="container">
                   <center>
                   <div id="bannerContent">
					
                       <h3>Welcome To Online Bakery Shop!!.</h3>
                       <p>Flat 50% OFF on all Items.</p>
                       <a href="all products.php" class="btn btn-danger">Book Now</a>
                   </div>
                   </center>
               </div>
			  
           </div>
           <div class=" container">
               <div class="row">
                   <div class=" col-xs-3">
                       <div  class="thumbnail" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
            
                           <a href="cake.php">
                                <img src="img/cheese.jpg" height="25px" width="152px" alt="Camera">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">Cakes</p>
                                        <p>Choose among the best available in the Bakery.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-3">
                       <div class="thumbnail" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                           <a href="cookies.php">
                               <img src="img/cookie.png"  height="25px" width="230px" alt="cookies">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Cookies</p>
                                   <p>Our exquisite collection of Cookies.</p>
                               </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-3">
                       <div class="thumbnail" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                           <a href="breads.php">
                               <img src="img/bread.jpg"  height="25px" width="200px" alt="bread">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Breads</p>
                                   <p>Our exquisite collection of Breads.</p>
                               </div>
                           </center>
                       </div>
                   </div>
				   <div class="col-xs-3">
                       <div class="thumbnail" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                           <a href="all products.php">
                               <img src="img/home.jpg"  height="27px" width="214px" alt="all">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">All Products</p>
                                   <p>Choose among the best available in the Bakery.</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
            <br>
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