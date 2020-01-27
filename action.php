<?php  
 //action.php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "bakery");  
 if(isset($_POST["product_id"]))  
 {  
      $order_table = '';  
      $message = '';  
      if($_POST["action"] == "add")  
      {  
           if(isset($_SESSION["booking"]))  
           {  
                $is_available = 0;  
                foreach($_SESSION["booking"] as $keys => $values)  
                {  
                     if($_SESSION["booking"][$keys]['item_id'] == $_POST["item_id"])  
                     {  
                          $is_available++;  
                          $_SESSION["booking"][$keys]['item_quantity'] = $_SESSION["booking"][$keys]
						  ['item_quantity'] + $_POST["item_quantity"];  
                     }  
                }  
                if($is_available < 1)  
                {  
                     $item_array = array(  
                          'item_id'               =>     $_POST["item_id"],  
                          'item_name'               =>     $_POST["item_name"],  
                          'item_price'               =>     $_POST["item_price"],  
                          'item_quantity'          =>     $_POST["item_quantity"]  
                     );  
                     $_SESSION["booking"][] = $item_array;  
                }  
           }  
           else  
           {  
                $item_array = array(  
                     'item_id'               =>     $_POST["item_id"],  
                     'item_name'               =>     $_POST["item_name"],  
                     'item_price'               =>     $_POST["item_price"],  
                     'item_quantity'          =>     $_POST["item_quantity"]  
                );  
                $_SESSION["booking"][] = $item_array;  
           }  
      }  
      if($_POST["action"] == "remove")  
      {  
           foreach($_SESSION["booking"] as $keys => $values)  
           {  
                if($values["item_id"] == $_POST["item_id"])  
                {  
                     unset($_SESSION["booking"][$keys]);  
                     $message = '<label class="text-success">Item Removed</label>';  
                }  
           }  
      }  
      if($_POST["action"] == "quantity_change")  
      {  
           foreach($_SESSION["booking"] as $keys => $values)  
           {  
                if($_SESSION["booking"][$keys]['item_id'] == $_POST["item_id"])  
                {  
                     $_SESSION["booking"][$keys]['item_quantity'] = $_POST["item"];  
                }  
           }  
      }  
      $order_table .= '  
           '.$message.'  
           <table class="table table-bordered">  
                <tr>  
                     <th width="40%">Product Name</th>  
                     <th width="10%">Quantity</th>  
                     <th width="20%">Price</th>  
                     <th width="15%">Total</th>  
                     <th width="5%">Action</th>  
                </tr>  
           ';  
      if(!empty($_SESSION["shopping_cart"]))  
      {  
           $total = 0;  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $order_table .= '  
                     <tr>  
                          <td>'.$values["product_name"].'</td>  
                          <td><input type="text" name="quantity[]" id="quantity'.$values["product_id"].'" value="'.$values["product_quantity"].'" class="form-control quantity" data-product_id="'.$values["product_id"].'" /></td>  
                          <td align="right">$ '.$values["product_price"].'</td>  
                          <td align="right">$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>  
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["product_id"].'">Remove</button></td>  
                     </tr>  
                ';  
                $total = $total + ($values["product_quantity"] * $values["product_price"]);  
           }  
           $order_table .= '  
                <tr>  
                     <td colspan="3" align="right">Total</td>  
                     <td align="right">$ '.number_format($total, 2).'</td>  
                     <td></td>  
                </tr>  
                <tr>  
                     <td colspan="5" align="center">  
                          <form method="post" action="cart.php">  
                               <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                          </form>  
                     </td>  
                </tr>  
           ';  
      }  
      $order_table .= '</table>';  
      $output = array(  
           'order_table'     =>     $order_table,  
           'cart_item'          =>     count($_SESSION["shopping_cart"])  
      );  
      echo json_encode($output);  
 }  
 ?>




