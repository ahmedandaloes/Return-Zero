<?php

	$password_error = $Repassword_error = $DB_error ="";
	$password = $Repassword = "";
	
$conn = new mysqli('localhost','root','','messaging system');


	if($conn->connect_error) {

	$DB_error ="database connection error!";
} else{
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
	 //password validation
	 
	 if (empty($_POST["Password"])) {
    $password_error = "you must enter a password ! ";
  } else {
    $password= test_input($_POST["Password"]);
    
 
      if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$password)) {
      $password_error = "Invalid password ! "; 
    }
  }
  
  if (empty($_POST["Repassword"])) {
    $Repassword_error = "you must enter a password !";
  }
  
  //matching passwords !
  if($Repassword_error == "" && $password_error == "" ) {
  	
  	
  if($_POST['Password'] != $_POST['Repassword']){
		$password_error = "passwords do not match !!";
	}else{

 
 
 
 	
 	$password= test_input($_POST["Password"]);
 	
 	$ID = 17 ; 
 	
 	 if ($stmt = $conn->prepare("UPDATE user SET Password =?  WHERE UserID = ?")){
            
            
				$stmt->bind_param('sd', $password, $ID);
				
				$stmt->execute();
            $stmt->close();
            $DB_error ="  yaaaaaaaaah!";
    }
    else {
        $DB_error =" fuck errors!";
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