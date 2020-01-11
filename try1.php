<?php
  session_start();
   $x=$_SESSION['email'];
   $y=$_SESSION['UserID'];
$link = mysqli_connect("localhost","root","","messaging system");
if (mysqli_connect_error()) {
die("Could not connect to database");
}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
 <head>
    <meta charset="utf-8">
    <title>mailBOX</title>
      <link type="text/css" rel="stylesheet" href="sendsty.css">
  <link type="text/css" rel="stylesheet" href="navsty.css">

    </head>
 <body>

  <?php

if(isset($_GET['messsage'])){
$id = $_GET['messsage'];

$query = "SELECT * FROM message WHERE ID ='$id' ";
$result=mysqli_query($link, $query);

//$mes = mysql_query("SELECT * FROM message WHERE ID ='$id'");
$row=mysqli_fetch_array($result);
$from = $row["M_From"];
$subject = $row["M_Subject"];
$message = $row["Message"];
$time = $row["TimeStamp"];
?>


<div class="wrap">
  <a href="try1.php"> back to inbox</a>  
<table class="form1">
 <tr>
       <td> from :   <?php echo $from;    ?></td>
       <td> subject :<?php echo $subject; ?></td>
       <td> time :   <?php echo $time;    ?></td>
 </tr>
</table>
<pre> <?php echo $message; ?></pre>
</div>

<?php exit();} ?>

  
 	<header>
   <a id="logo" href="#">OP</a>
  <nav>
    <ul>
      <li><a href="send.php">SEND</a></li>
      
      <li><a href="try1.php">inbox</a></li>
      
      <li><a href="logoutproc.php">logout</a></li>
      
    </ul>
  </nav>
</header>
      
  
<div  id= "back" class="wrap">
	<form action="" method="post">
<?php


echo '<table class="form1">
       <tr>
       <th>from</th>
       <th>subject</th>
       <th>id</th>
       </tr>';
    //   $query = mysql_query("SELECT * FROM message WHERE M_To='$x' ");{


$query = "SELECT * FROM message WHERE UserID='$y' ";
if ($result=mysqli_query($link, $query)) {

  while($row=mysqli_fetch_array($result)){
$from = $row["M_From"];
$subject = $row["M_Subject"];
$message = $row["Message"];
$id= $row["ID"];
       echo ' <tr>';
       echo ' <td>'.$from.'</td>';
       echo ' <td><a href="?messsage='.$id.'">'.$subject.'</a></td>';
       echo '<td>'.$id.'</td>'; 
       echo ' </tr>';
}
echo '</table>';
}
 else {
echo "It failed";
}

?>
</form>
</div>

</body>
</html>