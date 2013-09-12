<?php 
function sendEmail()
{
	require_once "Email/class.phpmailer.php";
	include 'Email/config.php';
	try{
		$params=func_get_args();
		if(func_num_args()>4){
			$ccadd=$params[4];
			$mail->AddCC($ccadd);
		}
		if(func_num_args()>5){
		for($i=5;$i<func_num_args();$i++){
			$bccadd=$params[$i];
			$mail->AddBCC($bccadd);
		}
		}
		$to = $params[0];
		$mail->AddAddress($to);
		$mail->AddBCC("contact@yousee.in");
		$body =  "Dear  " .$params[2]. ",<br><br>".$params[3];
		$body.="<br><br><br> From,<bt /><img src='../images/uc-logo.jpg' alt='YouSee' /><br /> Contact phone : +91-8008-884422 <br /> Website : <a href=\"www.yousee.in\">www.yousee.in</a>";
		$mail->Subject = $params[1];
		$mail->Body = $body;
		if($mail->Send())
		{
			$mail->ClearAllRecipients();
			$mail->ClearAttachments();
			$mail->ClearCustomHeaders();
		}
		else{
			echo "<script>alert('email failed');</script>";
			$mail->ErrorInfo;
			showError();
		}
	}
	catch (phpmailerException $e) {
		echo $e->errorMessage();
		echo "<script>alert('Message failed');</script>";
	}
}
?>
