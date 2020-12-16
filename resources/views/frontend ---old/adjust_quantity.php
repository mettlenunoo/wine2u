<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>



<?php

			if(isset($_POST['itemID'])){
			// Excute some code
			$itemID = $_POST['itemID'];
			$quantity = $_POST['item_quantity'];
			$price = $_POST['price'];
			$isChild = $_POST['isChild'];

			//$prod_attribute = $_POST['item_attribute'];

            $rows = 0;
            if(isChild == 1){
            	$sql = "SELECT * from product_child_tb  WHERE id = $itemID AND qty >= '$quantity' LIMIT 1";
            }else{
            	$sql = "SELECT * from product_tb  WHERE id = $itemID AND qty >= '$quantity' LIMIT 1";
            }	
            
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $q->rowCount();

			$quantity = preg_replace('#[^0-9]#i',"",$quantity);
			if($quantity >= 100){$quantity = 99;}
			if($quantity <= 1){$quantity = 1;}

			$i = 0;
			$_SESSION["cart_array"];

			foreach($_SESSION['cart_array'] as $each_item){
				//$Sel_attribute = $each_item['attribute'];
				$i++;
				while(list($key,$value) = each($each_item)){
			   if($key == "item_id" && $value == $itemID ){

                 if($each_item['quantity'] < $quantity){
				// that item is in cart already so let's adjust its quantity using array
                 $quantity_remain = $quantity - $each_item['quantity'];
                 $amount = $quantity_remain * $price;
                 
                 //New here
                 if($isChild == 1){
			array_splice($_SESSION["cart_array"], $i-1,1,array(array("item_id" => $itemID, "quantity" => $quantity,"price" => $each_item['price'] + $price, "child" => true)));
		  }else{
		  	array_splice($_SESSION["cart_array"], $i-1,1,array(array("item_id" => $itemID, "quantity" => $quantity,"price" => $each_item['price'] + $price)));
		  }
                 
                 //End New

				//array_splice($_SESSION["cart_array"], $i-1,1,array(array("item_id" => $itemID, "quantity" => $quantity,"price" => $each_item['price'] + $price)));

	          $_SESSION['totalAmt'] = $_SESSION['totalAmt'] + $amount;


                   }elseif ($each_item['quantity'] > $quantity) {

                        // that item is in cart already so let's adjust its quantity using array
                 $quantity_remain = $each_item['quantity'] - $quantity;
                 $amount = $quantity_remain * $price;
                 
                 //New here
                 if($isChild == 1){
			array_splice($_SESSION["cart_array"], $i-1,1,array(array("item_id" => $itemID, "quantity" => $quantity,"price" => $each_item['price'] + $price, "child" => true)));
		  }else{
		  	array_splice($_SESSION["cart_array"], $i-1,1,array(array("item_id" => $itemID, "quantity" => $quantity,"price" => $each_item['price'] + $price)));
		  }
                 
                 //End New

				//array_splice($_SESSION["cart_array"], $i-1,1,array(array("item_id" => $itemID, "quantity" => $quantity,"price" => $each_item['price'] + $price)));

				        $_SESSION['totalAmt'] = $_SESSION['totalAmt'] - $amount;

                   }


			 }




			}

			}

			}
?>

