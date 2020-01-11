<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
  <title>RETURN_ZERO</title> 
    

    <?php include 'forgetpassprocess.php';?>
    
	<link type="text/css" rel="stylesheet" href="forgetpasssty.css">
	<link type="text/css" rel="stylesheet" href="navsty.css">
	
	
	
	

</head>

<body>

	<header>
   <a id="logo" href="#">OP</a>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
       <li><a href="login.php">LOGIN</a></li>
      <li><a href="register.php">REGISTRATION</a></li>
     
    </ul>
  </nav>
</header>
	
<div class='wrap'>
 FORGET PASSWORD
  <br><br>

    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    
    		<span class="error"> <?php echo $DB_error; ?></span>
    		<span class="error"> <?php echo $Email_error;?></span>
        <input placeholder="Email       ex:{joe123@mail.com}" name="Email" value="<?php echo $Email; ?>" type="text"    />
        
        
        
        <button type="submit" data-submit="...Sending">SEND</button>
        
        
    
  
</form>
  </div>
	</body>
</html>
