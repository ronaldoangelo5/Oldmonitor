<?php

function Send_Mail($to,$subject){
	include ('../inc/konek.php');
	error_reporting(E_ALL);
	require("class.phpmailer.php");

	$mail = new PHPMailer();
	$mail->IsSMTP();
	//$mail->SMTPDebug = 2;

	$mail->From = "admin@rorit.id";
	$mail->FromName = "Admin";
	$mail->Host = "srv45.niagahoster.com";
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->SMTPAuth = true;
	$mail->Username = "admin@rorit.id";
	$mail->Password = "m3s1ncuc1";
	$mail->IsHTML(true);

	$web=  "<html>
				<head>
					<title></title>
				</head>
				<body>
					Please, open website <a href='#'> website</a> to check new update
					<br>
					<b>This email can not be replied </b>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					Best Regards
					<br>
					Developer of Presales App
				</body>
			</html>";



	//echo 	$to;
	
	$mail->Subject = " was sending new Presales";
	$mail->MsgHTML($web);

	while (list ($key, $val) = each ($to)) {
		$mail->AddAddress($val);
	}
	if(!$mail->send()){
		echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else{
		echo "Message has been sent successfully";
	}
	
}
?>