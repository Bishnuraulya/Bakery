<?php  
 $connect = mysqli_connect("localhost", "root", "", "bakery_db");  
 $query = "SELECT * FROM order_table ORDER BY order_id desc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>DatePicker</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
           <?php
    require 'header4.php';
?>	
           <div class="container" style="width:1000px;">  
                <h3 align="center">User Information:</h3>
				<center>
   <form action="search user.php" method="post">
    <input type="hidden" name="search" value="true">
    <input type ="text" name="name" placeholder="Search User!">
    <input type="submit"  name="search" style="margin-top:5px" class="btn btn-info" value="Search"  />
	
	</center>
    </form>
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="20%">Name</th>  
							    <th width="20%">Address</th>  
                               <th width="15%">Contact</th>
								<th width="35%">Email</th>
                               
                          </tr>  
                     <?php  
                     while($row =mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["order_id"]; ?></td>   
                               <td><?php echo $row["Name"]; ?></td>  
							   <td><?php echo $row["Address"]; ?></td> 
                               <td><?php echo $row["Cont_Number"]; ?></td> 
								<td><?php echo $row["Email"]; ?></td> 
								
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  

      </body>  
 </html>  
 