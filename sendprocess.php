<?php

$DB_error  = $M_To_error = $M_Subject_error = $Message_error = "" ;
$M_To = $M_Subject = $Message = "" ;

$conn = new mysqli('localhost','root','','messaging system');

	if($conn->connect_error) {

	$DB_error ="database connection error!";
} else{

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	//M_TO validation	
	
	if (empty($_POST["M_To"])) {
    $M_To_error = "you must specify to whom you will send this message !";
  } else {
  	
  	$M_To = test_input($_POST["M_To"]);
  	
  	if (!filter_var($M_To, FILTER_VALIDATE_EMAIL)) {
      $M_To_error = "Invalid email format"; 
    }else{
    	$result= $conn->query("SELECT * FROM user WHERE Email = '$M_To' ");
		 if( $result->num_rows == 0 ){
		 
		 $M_To_error = "This Email is not exists";
		 
		 }
    }
    
  }

//subject validation

	if (empty($_POST["M_Subject"])) {
    $M_Subject_error = "better you specify a subject";
  } else {
    $M_Subject = test_input($_POST["M_Subject"]);
  }
  
//message

	if (empty($_POST["Message"])) {
    $Message_error = "it's an empty message !";
  } else {
    $Message = test_input($_POST["Message"]);
  }

	if($M_To_error == "" && $M_Subject_error == "" && $Message_error == "" ){
		
		
		
		
		$M_To = test_input($_POST["M_To"]);
		$M_Subject = test_input($_POST["M_Subject"]);
		$Message = test_input($_POST["Message"]);
		
		$result= $conn->query("SELECT * FROM user WHERE Email = '$M_To' ");
		 
		 	$row = $result->fetch_assoc();
		 	$UserID = $row['UserID'];
		
		
		$sql = "INSERT INTO message (M_To, M_Subject,Message,M_From,UserID) VALUES (?,?,?,?,?)" ;
		
		$stmt = mysqli_stmt_init($conn);
		
	

		 if(mysqli_stmt_prepare($stmt,$sql)){
			
    		$DB_error ="message sent";
    		session_start();
    		$x=$_SESSION['email'];
    		$y=$_SESSION['UserID'];
    		mysqli_stmt_bind_param($stmt,"ssssd",$M_To,$M_Subject,$Message,$x,$UserID);
    		mysqli_stmt_execute($stmt);
    		header( "Refresh:2; url=try1.php" );
			} else {
    							
    		$DB_error ="something wents wrong !!!! ";
    		
    		} 




	}










		}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

?>