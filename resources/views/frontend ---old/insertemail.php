<?php  require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>

<?php

			if(isset($_POST['email'])){
				
				try{
					
    $stmt = $conn->prepare("INSERT INTO newsletter_tb (email, date, time)
    VALUES (:email, :date, :time)");
	
	//  ASSIGN VALUES TO THE VARIABLES
		$email = $_POST['email'];
		$date = date('Y-m-d');
		$time = date("h:m:s");
	// SET PARAMETERS
	
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
	// EXECUTE
	$stmt->execute();



// SUCCESS MESSAGE
//$message = "New records created successfully";

  }
catch(PDOException $e)
    {
	// ERROR MESSAGE
    $message = "<br>" . $e->getMessage();
    }
	
	// CLOSE CONNECTION
//$conn = null;



}

?>