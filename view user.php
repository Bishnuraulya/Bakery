	<html>
   <head>
   <title>Retrive Data:</title><center>
   <h1>Customer Details</h1></center>
   <style type="text/css">
   body{
 margin:0px;
 padding:0px;
 background:url(cover.jpeg);
 background-position:center;
 font-family:sans-serif;
}
    table{
    	background:#fcf;
    }
    th{
		background:red;
    	width:220px;
    	text-align:center;
		font-size:25px;
    }
	h1{
		color:#fff;
		margin-top:10px;
	}
</style>
 
    <?php
     $con=mysqli_connect("localhost", "root", "", "registration_db") or die("connection failed");
      $query="SELECT * FROM registration "; 
      $result=mysqli_query($con, $query) or die("can not display");
      $num_rows=mysqli_num_rows($result);
	   echo "<center>";
       echo"<table border='1'>";
        echo"<tr><th>ID</th><th>Name</th><th>Address</th><th>Contact</th><th>Gender</th><th>Email</th></tr>";
          while($row=mysqli_fetch_assoc($result))
          {
          	echo"<tr>";
			echo "<td>".$row['Id']. "</td>";
          	echo "<td>".$row['Name']. "</td>";
          	echo "<td>".$row['Address']."</td>";
          	echo"<td>". $row['Contact']."</td>";
			echo"<td>". $row['Gender']."</td>";
			echo"<td>". $row['Email']."</td>";
          	 echo"</td>";
			 echo "</center>";
          }
         echo"</table>";
		 echo "<center>";
        echo"<h1>". "Total Users:"."$num_rows"."</h1>";
      ?>
  </body>
  		 
</html>