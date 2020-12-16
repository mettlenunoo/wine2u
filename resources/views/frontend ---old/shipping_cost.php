<?php  require_once("includes/session.php");?>
<?php require_once("includes/connection_old.php");?>
<?php require_once("includes/function.php");?>

<?php

			if(isset($_POST['zone'])){

				$zone = $_POST['zone'];
				$shipping_qty = $_POST['shipping_qty'];
				
				   try {
                   $country = $_SESSION['country'];
                    $sql = "SELECT * from shipping_wwe_tb WHERE kg >= $shipping_qty  AND type = '$country' ORDER BY kg ASC LIMIT 1 ";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):

                     $id = $row['id'];
                     $kg= $row['kg'];
                     $zone1 = $row['zone1'];
                     $zone2 = $row['zone2'];
                     $zone3 = $row['zone3'];
                     $zone4 = $row['zone4'];
                     $zone5 = $row['zone5'];
                     $zone6 = $row['zone6'];
                     $zone7 = $row['zone7'];
                     $zone8 = $row['zone8'];

                    endwhile;
                      
               
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }


                 ######################    RATE  ###############################
                  $sql = "SELECT * from rate_tb";
                    $q = $conn->query($sql);
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $q->fetch()):
                     $id = $row['id'];
                     $rate= $row['rate'];
                     $date= $row['date'];
                     $publish= $row['publish'];

                    endwhile;
                #################### END OF RATE ##############################

                   if($country == 1){
                        if($zone == 1){
                           echo  $zone1;
                        }elseif ($zone == 2) {
                        	echo  $zone2;
                        }elseif ($zone == 3) {
                        	echo  $zone3;
                        }elseif ($zone == 4) {
                        	echo  $zone4;
                        }elseif ($zone == 5) {
                        	echo  $zone5;
                        }elseif ($zone == 6) {
                        	echo  $zone6;
                        }elseif ($zone == 7) {
                        	echo  $zone7;
                        }elseif ($zone == 8) {
                        	echo  $zone8;
                        }

                 }else if($country == 2 ){
                     
                      if($zone == 1){
                           $total_fee =  $zone1/$rate;
                        }elseif ($zone == 2) {
                            $total_fee =  $zone2/$rate;
                        }elseif ($zone == 3) {
                            $total_fee = $zone3/$rate;
                        }elseif ($zone == 4) {
                            $total_fee =  $zone4/$rate;
                        }elseif ($zone == 5) {
                           $total_fee = $zone5/$rate;
                        }elseif ($zone == 6) {
                            $total_fee =  $zone6/$rate;
                        }elseif ($zone == 7) {
                            $total_fee =  $zone7/$rate;
                        }elseif ($zone == 8) {
                            $total_fee =  $zone8/$rate;
                        }
                       echo number_format($total_fee,2);



                 }

                     //echo $shipping_qty;
                          }

?>