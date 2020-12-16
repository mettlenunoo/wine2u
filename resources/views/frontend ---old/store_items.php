<?php  require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>

<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-glyphicons.css" rel="stylesheet">

<?php if($_SESSION['country'] ==1 ){ $currency_amt = "GHC "; } elseif($_SESSION['country'] ==2){ $currency_amt = " $ "; }?>

<?php
  $_SESSION['totalAmt'];
  
  //  DEFAULT LOAD
  if(isset($_POST['total_cart_items']))
  {
  
   echo count($_SESSION['cart_array'])."<br/>".$currency_amt.number_format($_SESSION['totalAmt'],2);
	//echo count($_SESSION['name']);
	exit();
  }

  
    // ADD CART CODE
  
    if(isset($_POST['itemID']))
  {
			$pid = $_POST['itemID'];
			$price = $_POST['item_price'];
			$pdt_name = $_POST['pdt_name'];
			
			$wasFound = false;
			$i=0;
			// if the cart session variable is not set or cart array is empty
			if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1){
			   // RUN IF THE CART IS EMPTY OR NOT SET
			$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "item_name" => $pdt_name, "quantity" => 1,"price" => $price));
             
             //$totalAmt = $price;		
              
               $_SESSION['totalAmt'] = $_SESSION['totalAmt'] + $price;			  
			  
			}else{
			  // RUN IF THE CART AT LEAST ONE ITEM IN IT
			foreach($_SESSION["cart_array"] as $each_item){
			 $i++;
			while(list($key, $value) = each($each_item)){
			if($key =="item_id" && $value == $pid){
			// the item is in cart already so let's adjust it quantity using array_splice()
			array_splice($_SESSION["cart_array"], $i-1,1,array(array("item_id" => $pid, "item_name" => $pdt_name, "quantity" => $each_item['quantity'] + 1, "price" =>  $price )));
			 $wasFound = true;
              $_SESSION['totalAmt'] = $_SESSION['totalAmt'] + $price;	
			}

			}

			}

			if($wasFound == false){
			array_push($_SESSION["cart_array"],array("item_id" => $pid, "item_name" => $pdt_name, "quantity" => 1,"price" => $price));
            
			 $_SESSION['totalAmt'] = $_SESSION['totalAmt'] + $price;	
			
			}
			}
			//echo "<script> window.location.replace('index.php') </script>";

	//$_SESSION['name'][]=$_POST['item_name'];
   // $_SESSION['price'][]=$_POST['item_price'];
   // $_SESSION['src'][]=$_POST['item_src'];
   
    echo count($_SESSION['cart_array'])." <br/> ".$currency_amt.number_format($_SESSION['totalAmt'],2);
    exit();
  }
         
		 
		 
		 
		 //CODE FOR VIEWING CART
		 
       if(isset($_POST['showcart'])){

       	           $total_amt = 0;
       	           $sub_total = 0;
	              # CODE FOR ORDER PRODUCTS 
				if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])< 1){
                   

				}else{
				 $i =0;

				foreach($_SESSION["cart_array"] as  $each_item){
                 $i++;
				$item_id = $each_item['item_id'];
				$quantity = $each_item['quantity'];
				$price = $each_item['price'];
				//$pdt_name = $each_item['item_name'];

                    
				    $sql = "SELECT * from product_tb  WHERE id = $item_id LIMIT 1";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);

                     while ($row = $q->fetch()): 
 
							?>	
                             	<li>
                             		<div class="media">
						<div class="media-left">
							<img src="<?= $row['img1'];?>" class="media-object" style="height: 90px; width: 70px; object-fit: cover;">
						</div>
					  	<div class="media-body" style="padding-right:10px;">
					    		<h4 style="margin-top:0px;margin-bottom:10px;font-size:16px;"><?= ucwords($row['title']);?></h4>
					    		<p style="font-size: 13px;margin-bottom:10px;">
					                        <?php $str = strip_tags(decode_entities($row["content"]));
			                           			if(strlen($str) > 80){
				                        			$str = substr($str,0,80)." ...";
				                       				echo $str;
						                	}elseif(strlen($str) <= 80){
						                		echo $str;
						                	}
			                     			 ?>
				              		</p>
				              		<div class="clearfix">
							    <?php if($_SESSION['country'] == 1){ ?>
								<p class="pull-left small">QTY: <?= $quantity; ?> X GHS
								<?php
								     if($row['sales_gh'] > 0){
								      	$single_price = $row['sales_gh'];
								        $total_amt =  $quantity * $single_price;
								        $sub_total = $sub_total + $total_amt;
								       	echo number_format($single_price,2);
								     }else{
								      	$single_price = $row['regular_gh'];
								      	$total_amt =  $quantity * $single_price;
								      	$sub_total = $sub_total + $total_amt;
								      	echo number_format($single_price,2);
								     }
								?>
					
							     <?php }elseif ($_SESSION['country'] == 2) { ?>
									<p class="small pull-left">QTY: <?= $quantity; ?> X &#36
									<?php
									     if($row['sales_us'] > 0){
									       	$single_price = $row['sales_us'];
									        $total_amt =  $quantity * $single_price;
									        $sub_total = $sub_total + $total_amt;
									       	echo number_format($single_price,2);
									     }else{
									      	$single_price = $row['regular_us'];
									      	$total_amt =  $quantity * $single_price;
									      	$sub_total = $sub_total + $total_amt;
									      	echo number_format($single_price,2);
									     }
									?>
									
							 	<?php
						      		}
						      		?>
						      		<?php if($_SESSION['country'] == 1){ ?>
						    			<p class="pull-right" style="font-weight: 600;    margin-bottom: 5px;">GHS <?= number_format($total_amt,2); ?></p>
						    				<?php }elseif ($_SESSION['country'] == 2){ ?>
						    					<p class="pull-right" style="font-weight: 600;">
						    					 &#36 <?= number_format($total_amt,2); ?></p>
						    		<?php	} ?>
						          </div>
				                       </div>
					  	</div>

	    					<!--<p class="small">SIZE: <?= $row['size'];?></p>-->
	    					<!--	<p class="text-danger">Item available in stock</p>-->
   					</li>


						<?php

					endwhile;

                   

				  if($i >= 3){
                  
                   //break;

				  }// end of break 

					}// end of looop


					}// END OF ORDER SCRIPT

	//$_SESSION['totalAmt'] = $sub_total;

    exit();	
  }
?>