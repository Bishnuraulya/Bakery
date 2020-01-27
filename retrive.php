	<html>
   <head>
   <title>Retrive Data:</title>
   <style type="text/css">
    table{
    	background:#fcf;
    }
    th{
    	width:100px;
    	text-align:center;
    }
</style>
   </head>
   <body>
   <form action="retrive.php" method="post">
    <input type="hidden" name="submitted" value="true">
    <input type ="text" name="name" placeholder="Enter Here your name">
      <input type ="hidden" name="phone" placeholder="Enter Here your Phone">
    <input type="submit"  value="Display">
    </form>
    <?php
     if(isset($_POST['submitted'])){
     $con=mysqli_connect("localhost", "root", "", "bakery_db") or die("connection failed");
      $uname=$_POST['name'];
      //$phone=$_POST['phone'];
      $query="SELECT * FROM products WHERE  Nname LIKE '%".$name."%'";
      $result=mysqli_query($con, $query) or die("can not display");
      $num_rows=mysqli_num_rows($result);
       echo "$num_rows found";
       echo"<table border='1'>";
        echo"<tr><th>Uname</th><th>Password</th><th>Fname</th><th>Phone</th><th>Image</th></tr>";
          while($row=mysqli_fetch_assoc($result))
          {
          	echo"<tr>";
          	echo "<td>".$row['name']."</td>";
          	echo "<td>".$row['password']. "</td>";
          	echo "<td>".$row['fname']."</td>";
          	echo"<td>". $row['phone']."</td>";
			echo"<td>"."<img src='$row[image]' width='100'/>"."</td>";
          	 echo"</td><td>";
          	 echo "<a href='index.php' target='_blank'>Update:</a>";
          	 echo"</td></tr>";
          }
  echo"</table>";
}
      ?>
	  <br>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>This website is developed by Bishnu Raulya </p>
               </center>
               </div>
           </footer> 
  </body>
</html>