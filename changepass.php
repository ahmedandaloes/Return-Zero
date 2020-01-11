<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <title>FuckMailBox</title>
    
	<?php include 'changepassprocess.php';?>	
	
	<link type="text/css" rel="stylesheet" href="changepasssty.css">
	<link type="text/css" rel="stylesheet" href="navsty.css">
	

</head>

<body>
	
<div class='wrap'>
 CHANGE PASSWORD
  <br><br>

    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    
        <span class="error"> <?php echo $DB_error; ?></span>
        
        <input placeholder="Password" name="Password"  type="password"     />
			
		<span class="error"> <?php echo $password_error; ?> </span>

        <input placeholder="RePassword" name="Repassword"  type="password"    />
        <span class="error"> <?php echo $Repassword_error; ?> </span>       
    
   <button type="submit" data-submit="...Sending">REGISTER</button>
</form>
  </div>
	</body>
</html>