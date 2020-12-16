<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>

<?php                      
                  if($_SESSION['country'] == 1){
					
                           $check_price = "   regular_gh > 0  ";
							  
                      }elseif ($_SESSION['country'] == 2) {
						  
                           $check_price = "  regular_us > 0  ";
							
                      }
                         if(isset($_POST["search"])){
								
                             $search = $_POST["search"];
							 
                 try {
                       $stat_us = "Yes";
                     $sql_q = "SELECT * from product_tb  WHERE publish = '$stat_us' AND $check_price AND title LIKE '%$search%' ORDER BY id DESC LIMIT 10";
					 $sql = $sql_q;
                    $q = $conn->query($sql);
                     $rows = $q->rowCount();
                    $q->setFetchMode(PDO::FETCH_ASSOC);
                  
                        } catch (PDOException $e) {
                            die("Could not connect to the database $dbname :" . $e->getMessage());
                        }

?>                     <?php if($rows > 0){?>
                         <?php  while ($row = $q->fetch()): ?>
                      
				              <li class="list-group-item"><a href="product/<?= $row['slug'];?>" style="width:100%;display:block;"><?= decode_entities($row['title']) ;?></a></li>
						  
						  <?php  endwhile; ?>

						 <?php }else{ ?>

					 <li class="list-group-item"> No Result Found</li>
					      <?php } ?>
							 
<?php 

}	

?>