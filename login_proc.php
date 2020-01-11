<?php

$Email_error = $Password_error = $DB_error = "";
$Email = $Password = "" ;


$conn = new mysqli('localhost','root','','messaging system');

	if($conn->connect_error) {

	$DB_error ="database connection error!";
}else{
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
		if (empty($_POST["Email"])) {
    $Email_error = "Email is required";
  } else {
    $Email = test_input($_POST["Email"]);
    // check if e-mail address is well-formed with a built in function in php ^^
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $Email_error = "Invalid email format"; 
    }
  }
  
  
  //Password validation
  if (empty($_POST["Password"])) {
    $Password_error = "you must enter a password ! ";
  } else {
    $Password= test_input($_POST["Password"]);
  
  }
  
  if($Email_error == "" && $Password_error == ""  ) {
	
	
		 $Email = test_input($_POST["Email"]);
		 $Password= test_input($_POST["Password"]);
		 
		 $result= $conn->query("SELECT * FROM user WHERE Email = '$Email' AND Password='$Password' ");
		 if( $result->num_rows > 0 ){
		 	$row = $result->fetch_assoc();
		 	session_start();
		 	$_SESSION['email'] = $row['Email'];
		 	$_SESSION['UserID'] = $row['UserID'];
		 	
		 	
		 
		 $DB_error ="welcome habibi ";
		 	
    		header( "Refresh:2; url=try1.php" );
		 
		 
		 }else{
		 
		 $DB_error ="incorrect Email or Password !";
		 
		 
		 }
		 
		 
		/*
		$stmt = $conn->prepare("SELECT * FROM user WHERE Email = '?' ");
		$stmt->bind_param("s",$Email);
		$stmt->execute();
		$result= $stmt->get_result();
		$row = $result->fetch_object();
		//$row = mysqli_fetch_row($row);
		 
		 while($row = $result->fetch_object()) {
		 
		 $result[] = $row;
		 
		 }
		
		//$DB_error = " print_r($result) ";
    		
    	if($result[2] == $Email && $result[3] == $Password ) {
    		//session_start();
    		$DB_error ="done with this query";
    		header( "Refresh:3; url=register.php" );
    		
    		
    		} else{
    		
    		$DB_error ="invalid Email or Password !";
    		
    		
    		}  
    		
    		
			*/
		
		
		}
		//POST
		}

//DB
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //error with this function take a look to it !!
  //$data = mysql_real_escape_string($data);
  return $data;
} 


















?>