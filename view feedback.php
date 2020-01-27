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
            require 'header4.php';
           ?>
    <?php
     $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
      $query="SELECT * FROM feedback  order by ID desc "; 
      $result=mysqli_query($con, $query) or die("can not display");
      $num_rows=mysqli_num_rows($result);
	  echo "<center>";
		                     echo '
                    
                     <div class="table-responsive">  
                          <table class="table">  
                              
                               <tr>  
                                    <td align="center"><label><h4>Feedbacks</h4></label></td>  
                               </tr>  
                               <tr>  
                                    <td>  
                                         <table class="table table-bordered">  
                                              <tr>  
                                                   <th width="10%">ID</th> 
												    
												   <th width="15%">Name</th>
												   <th width="15%">Address</th>
                                                   <th width="10%">Phone</th>  
												   <th width="15%">Email</th>  
                                                   <th width="25%">Message</th>  
												   
												   
                                              </tr>  ';
          while($row=mysqli_fetch_assoc($result))
          {
			  echo "<center>";
          	echo"<tr>";
          	
			echo "<td>".$row['ID']. "</td>";
			echo "<td>".$row['Name']. "</td>";
          	echo "<td>".$row['Address']. "</td>";
			echo "<td>".$row['Phone']. "</td>";
			echo "<td>".$row['Email']. "</td>";
			echo "<td>".$row['Message']. "</td>";
			
			  
          }

  ?>
    </table>
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