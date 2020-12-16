<?php  require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>

<?php  

if(!empty($_POST["id"])){
	
try {

    //Deleting a row using a prepared statement.
$sql = "DELETE FROM photos_tb WHERE id = :photo_id";
 
//Prepare our DELETE statement.
$statement = $conn->prepare($sql);

//The make that we want to delete from our Blog table.
$ToDelete = $_POST["id"];
 
//Bind our $makeToDelete variable to the paramater :blog_id.
$statement->bindValue(':photo_id', $ToDelete);
 
//Execute our DELETE statement.
$delete = $statement->execute();

    }
   catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

//$conn = null;

}

?>
