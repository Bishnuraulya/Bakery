<!DOCTYPE html>
<html>
<head>
	<title>Update the value</title>
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
 <?php require 'header4.php';
 ?>
	<?php
	 $con=mysqli_connect("localhost", "root", "") or die("connection faled");
	  mysqli_select_db($con,'bakery_db');
	   $sql="SELECT * FROM  products";
	   $result=mysqli_query($con, $sql);
	  
	    ?>
		<br><br>
		<center>
	  <table border="1">
	  	<tr><th>ID</th>
	  		<th>Name</th>
	  		<th>Image</th>
	  		<th>Price</th>
			<th>Quantity</th>
			<th>Catgory</th>
			<th>Update</th>
	  	</tr>
	  	<?php
	  	 while($row=mysqli_fetch_array($result))
	  	 {
	  	 echo"<tr><form action=updatetable.php method=post>";
		echo"<td><input type=text  name=id value='".$row['ID']."'></td>";
	  	 echo"<td><input type=text  name=name value='".$row['Name']."'></td>";
	  	 echo"<td><input type=file name=profilePic value='".$row['Image']."'></td>";
	  	 echo"<td><input type=text  name=price value='".$row['Price']."'></td>";
		 	  	 echo"<td><input type=number  name=qty value='".$row['Quantity']."'></td>";
	  	 echo"<td><input type=text name=cat value='".$row['Category']."'></td>";
	  	echo"<td> <form action='' method='post'> <input type='submit' name='submit' class='btn-sm btn-danger' value='Update'>
			  </form> ";
		
	  	 echo"</form>";
    			 echo"</tr>";

	  	 }
	  		?>
			           <footer class="footer">
               <div class="container">
                <center>
                   <p>This website is developed by Bishnu Raulya</p>
               </center>
               </div>
           </footer>
	  </body>
	  </html>
	  