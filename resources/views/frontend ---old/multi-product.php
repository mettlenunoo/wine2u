<?php  require_once("includes/session.php");?>
<?php require_once("includes/connection_old.php");?>
<?php require_once("includes/function.php");?>

<?php

if(isset($_POST['product_name'])){

    $product = $_POST['product_name'];
    $size = $_POST['size'];
    
    try {
        
         $sql = "SELECT * from product_child_tb  WHERE title = '$product' AND size ='$size' LIMIT 1";
         $q = $conn->query($sql);
         $q->setFetchMode(PDO::FETCH_ASSOC);
         $children_arr = array();
         
            while ($row = $q->fetch()): 
                $children_arr[] = $row;         
            endwhile;
 
            echo json_encode($children_arr);
       
     } catch (PDOException $e) {
         die("Could not connect to the database $dbname :" . $e->getMessage());
     }

    }

?>