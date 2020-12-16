<?php  require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>

<?php
 
  //  UPDATE ORDER TABLE
  if(isset($_POST['OrderID'])){
  
     $id = $_POST['OrderID'];
	 $status = $_POST['order_name'];

      $stmt = $conn->prepare("UPDATE order_tb SET complete_status = :complete_status WHERE id = :id");

        // SET PARAMETERS
        $stmt->bindParam(':complete_status', $status);
        $stmt->bindParam(':id', $id);
        // EXECUTE
        $stmt->execute();

        if ($status == "Completed") {

             echo "<td><span class='label label-success'><i class='fa fa-check-circle'></i> &nbsp Completed </span> </td>";

        }elseif ($status == "pending") {
            
                echo "<td><span class='label label-primary'><i class='fa fa-exclamation-circle'></i> &nbsp pending </span> </td>";

        }elseif ($status == "cancelled") {
        	
        	     echo "<td><span class='label label-danger'><i class='fa fa-check-circle'></i> &nbsp Cancelled </span> </td>";
        }

	exit();
  }
?>