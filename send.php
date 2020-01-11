<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <title>FuckMailBox</title>
    <?php include 'sendprocess.php';?>
	<link type="text/css" rel="stylesheet" href="inboxsty.css">
	<link type="text/css" rel="stylesheet" href="navsty.css">
	 <style >
    .error {color: #FF0000;font-size: 20px;text-align: right;}
    
  </style>

</head>

<body>
	
		<header>
   <a id="logo" href="#">OP</a>
  <nav>
    <ul>
      <li><a href="try1.php">INBOX</a></li>
      <li><a href="#">SEND</a></li>
      <li><a href="logoutproc.php">LOGOUT</a></li>
          </ul>
  </nav>
</header>
	
<div class='wrap'>
  SEND MESSAGE
  <br><br>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    
    	<span class="error"> <?php echo $DB_error; ?></span>
    	
        <input type='text' id='to' name="M_To" placeholder='    TO:'>
        <span class="error"> <?php echo $M_To_error; ?></span>
        
        <input type='text' id='subject' name="M_Subject" placeholder='    SUBJECT'>
        <span class="error"> <?php echo $M_Subject_error; ?></span>
		<!-- <br><p>Send your message<p> -->   
       <textarea placeholder="MESSAGE" name="Message" rows="20" cols="20" ></textarea>  
       <span class="error"> <?php echo $Message_error; ?></span>

  <button type="submit" data-submit="...Sending" class="login">Send Message</button>
</form>
  </div>
	</body>
</html>
