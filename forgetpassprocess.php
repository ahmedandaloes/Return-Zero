<?php

	$Email_error = $DB_error ="";
	$Email="";
	
$conn = new mysqli('localhost','root','','messaging system');


	if($conn->connect_error) {

	$DB_error ="database connection error!";
} else{
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 //email validation
	 
	if (empty($_POST["Email"])) {
    $Email_error = "Email is required";
  } else {
    $Email = test_input($_POST["Email"]);
    
		 
    // check if e-mail address is well-formed with a built in function in php ^^
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $Email_error = "Invalid email format"; 
    }else {
    	
    	$result= $conn->query("SELECT * FROM user WHERE Email = '$Email' ");
		 if( $result->num_rows == 0 ){
		 
		 $Email_error = "This Email is not exits";
		 
		 }else {
		 	
		 	 
		 	 //header( "Refresh:2; url=Mailprocess.php" );
		 	 
		 	  include 'Mailprocess.php';
		 	 
		 	 
		 	 
		 	 
		 	 
		 }
    	
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