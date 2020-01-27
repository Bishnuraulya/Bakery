<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "bakery_db");

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
			echo'<script>window.location="all products.php"</script>';
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
			echo '<script>window.location="all products.php"</script>';
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
   <!DOCTYPE html>
<html>
<head> 
<title>Making Cart</title>
       
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
	
   <div style="clear:both"></div>
			<center><h3>Order Details</h3></center>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'>
						<th width="20%" >Item Name</th>
						<th width="20%">Quantity</th>
						<th width="20%">Price</th>
						<th width="20%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["booking"]))
					{
						$total =0;
						foreach($_SESSION["booking"] as $keys => $values)
						{
					?>
					<tr>
		<td><?php echo $values["item_name"]; ?></td>
		<td><?php echo $values["item_quantity"]; ?></td>
		<td> <?php echo $values["item_price"]; ?></td>
		<td> <?php echo number_format($values["item_quantity"] * $values["item_price"]);?></td>
						<td><a href="cartadd.php?action=delete&id=<?php echo $values["item_id"]; ?>">
						<span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px'>
						<td colspan="3" align="right"><b>Total</b></td>
						<td align="right"> &#8360;:  <?php echo number_format($total); ?></td>
						<td colspan="1"></td>
						
					<form action="" method="post">
					<input type="hidden" name="oid" value="1" />
					<input type="hidden" name="cid" value="1" />
					</form>
					      <tr>
					<td colspan="5" align="center">  
                          <form method="post" action="caartt.php"> 
						  <tr>
						<td colspan="6" align="center"><b>Personal Information</b></td>	
						</tr>
						
						<tr>						
						<input type="hidden" name="id"  required="true"> 
						<input type="hidden" name="uid"  required="true"> 
						  <td width="20%"><input type="text" name="name" placeholder="Enter your Name here!"  required="true"> </td>
						<td width="20%"><input type="text"  name="address" placeholder="Enter your Address here!"  required="true"> </td>
						<td width="20%"><input type="number" name="number" placeholder="Enter your Contact Number"  required="true"></td>
						<td width="15%" colspan="1"><input type="email"  name="email" placeholder="Enter your Email"  required="true"> </td>
						<td width="20%" colspan="2"><input type="text"  name="time" placeholder="Needed Time"  required="true"> </td>
						</tr>
						<tr>
						<center>
                        <td colspan="6" align="center"> <input type="submit"  name="place_order" class="btn btn-warning" value="Conform Order" />  </td>
							  </center> </tr>
                          </form>  
                     </td>  
                </tr>  
					<?php
					}
					?>
					
				</table>
			</div>
			</br>
			<footer class="footer"> 
               <div class="container">
               <center>
                   <p>This website is developed by Bishnu Raulya </p>
               </center>
               </div>
           </footer>
    </body>
</html>
	


