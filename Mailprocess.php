<?php
if(!class_exists('PHPMailer')) {
    require('phpmailer/class.phpmailer.php');
	require('phpmailer/class.smtp.php');
}

require_once("mail_configuration.php");



	$result= $conn->query("SELECT * FROM user WHERE Email = '$Email' ");
		 
		 	$row = $result->fetch_assoc();
		 	$Name = $row['Name'];




$mail = new PHPMailer();

$emailBody = "<div>" . $Name. ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "127.0.0.1/changepass.php?name=" . $Name . "'>" . PROJECT_HOME . "php-forgot-password-recover-code/reset_password.php?name=" . $Name . "</a><br><br></p>Regards,<br> Admin.</div>";

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = PORT;  
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
$mail->Mailer   = MAILER;

$mail->SetFrom(SERDER_EMAIL, SENDER_NAME); //from
$mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);//from
$mail->ReturnPath=SERDER_EMAIL;
	
$mail->AddAddress("$Email"); //to
$mail->Subject = "Forgot Password Recovery";	//subject	
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
	$DB_error = "Problem in Sending Password Recovery Email";
	
} else {
	$DB_error = "Please check your email to reset password!";
	header( "Refresh:4; url=login.php" );
}

?>