	
<!DOCTYPE html>
<html>
    <head>
       
        <title>Online Bakery</title>
		 <style>
		 body{
		  backgrond:blue;
		 }
		  </style>
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
      $query="SELECT * FROM products Order By ID desc "; 
      $result=mysqli_query($con, $query) or die("can not display");
      $num_rows=mysqli_num_rows($result);
	  echo "<center>";
		                     echo '
                    
                     <div class="table-responsive">
                          <table class="table" >  
						             

                              
                               <tr>  
                                    <td align="center"><label>Products Details</label></td>  
                               </tr>  
                               <tr>  
                                    <td>  
                                         <table class="table table-bordered">  
                                              <tr style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px">  
                                                   <th width="5%">ID</th> 
												   <th width="20%">Name</th> 
                                                   <th width="20%">Image</th>  
                                                   <th width="15%">Price</th>  
												    <th width="10%">Quantity</th>  
                                                   <th width="10%">Catgory</th> 
                                                   <th width="10%">Delete</th> 
												 
                                                   <th width="10%">Update</th>  
												   
												   
                                              </tr>  ';
          while($row=mysqli_fetch_assoc($result))
          {
			  echo "<center>";
          	echo"<tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'>";
          	echo "<td >".$row['ID']. "</td>";
          	echo "<td>".$row['Name']. "</td>";
			echo"<td>"."<img src='$row[Image]' width='80'/>"."</td>";
          	echo "<td>".$row['Price']."</td>";
			echo "<td>".$row['Quantity']."</td>";
			echo"<td>". $row['Category']."</td>";
			
          	 
			 echo"<td><a href=delete.php?id=".$row['ID'].">Delete </a></td>";
			 
			  
			 // echo"<td><form action='update.php' method='post'> <input type='submit' name='submit' class='btn-sm btn-danger' value='Update'>
			  // </form> ";
			echo"<td>";
			 echo" <a href='update.php' method='post'><span class='glyphicon glyphicon-edit'></span> </a></form>";
			 
          	 // echo "<a href='update.php' target='_blank'>Edit:</a>";
          	 echo"</td></tr>";
			 echo "</center>";
          }

  ?>
    </table>
   <script>
	  function checkdelete()
	  {
		  return confirm('Are you sure to delete this data?? ');
	  }
	  </script>
      <?php 
	  echo "<center>";
        echo"<h4>". "Total Products:"."$num_rows"."</h4>";
		// echo "<h4>"."select count('name') from 'products' where 'Category'='Cake'";
		$sql="SELECT count(Quantity) AS total from products Where Category='cake'";
		$result=mysqli_query($con, $sql);
		$values=mysqli_fetch_assoc($result);
		$num_rows=$values['total'];
		 echo"<h4>". "Total Cakes:"."$num_rows"."</h4>";
		 $sql="SELECT count(Quantity) AS total from products Where Category='bread'";
		$result=mysqli_query($con, $sql);
		$values=mysqli_fetch_assoc($result);
		$num_rows=$values['total'];
		 echo"<h4>". "Total Breads:"."$num_rows"."</h4>";
		 $sql="SELECT count(Quantity) AS total from products Where Category='cookies'";
		$result=mysqli_query($con, $sql);
		$values=mysqli_fetch_assoc($result);
		$num_rows=$values['total'];
		 echo"<h4>". "Total Cookies:"."$num_rows"."</h4>";
		 
      ?>
	 

        </div>
		<br><br>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>This website is developed by Bishnu Raulya </p>
               </center>
               </div>
           </footer> 
  </body>
</html>