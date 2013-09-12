<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$mail->IsQmail(); // telling the class to use SMTP  

	$mail->AddReplyTo("contact@yousee.in","Yousee");

	$mail->From       = "contact@yousee.in";
	$mail->FromName   = "YouSee";
	
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	//$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML
		
}
 catch (phpmailerException $e) {
	echo $e->errorMessage();
}

?>