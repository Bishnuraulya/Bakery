
<!DOCTYPE html>
<html>
<head>
        
        <title>Online Bakery</title>
       <!-- <meta charset="UTF-8">-->
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
    <body class="contrnair">
	
                  
	<?php
	 require 'header.php';
	 ?>
	<h1 class="text-center  text-danger md-5" >

			<?php
			$connect=mysqli_connect("localhost", "root", "", "bakery_db") or die("can not connect");
				$query = "SELECT * FROM products   WHERE Category='cake'"; 
				
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class=" col-md-3 ">
				<form method="post" action="cartadd.php?action=add&id=<?php echo $row["ID"]; ?>">
					
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="<?php echo $row['Image']; ?> "width="180"  height="180" alt="phone"  class="fluid mb-2">

						<h4 class="text-info"><?php echo $row["Name"]; ?></h4>

						<h5 class="text-danger">&#8360; <?php echo $row["Price"]; ?></h5>
						<h4 class="text-info">Left:<?php echo $row["Quantity"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>" />
						

						<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />
						<input type="hidden" name="hidden_quantity" value="<?php echo $row["Quantity"]; ?>" />

						<input type="submit" name="addcart" style="margin-top:5px" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
				<br>
			</div>
		
			<?php
					} 
				}
			?>
			
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
</html
<?php


if(isset($_POST["addcart"]))
{
	
	if(isset($_SESSION["booking"]))
	{
		$item_array_id = array_column($_SESSION["booking"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["booking"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
				
			);
			$_SESSION["booking"][$count] = $item_array;
			echo'<script>window.location="cake.php"</script>';
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
			echo '<script>window.location="cake.php"</script>';
		}
	}
	 
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
			
		);
		$_SESSION["booking"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["booking"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["booking"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cartadd.php"</script>';
			}
		}
	}
}
   ?>
   