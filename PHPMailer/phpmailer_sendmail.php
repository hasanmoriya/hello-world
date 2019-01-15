<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
// require 'vendor/autoload.php';
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
	//Server settings
	// $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'hasanmoriya429@gmail.com';                 // SMTP username
	$mail->Password = 'HASAN777MAHI';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	//Recipients
	$mail->setFrom('hasanmoriya429@gmail.com', 'Hasan Moriya');
	$mail->addAddress($email,$name);     // Add a recipient
	// $mail->addAddress('ellen@example.com');               // Name is optional
	// $mail->addReplyTo('info@example.com', 'Information');
	// $mail->addCC('cc@example.com');
	// $mail->addBCC('bcc@example.com');

	//Attachments
	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	//Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Here is the subject';
	$mail->Body    = 'Thanks for signing up!
 
Please click this link to activate your account:
http://localhost/froots/verify.php?id='.$last_id.'';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	$mail->smtpConnect(
		array(
			"ssl" => array(
				"verify_peer" => false,
				"verify_peer_name" => false,
				"allow_self_signed" => true
			)
		)
	);
	$mail->send();
	$success=1;
	// echo 'Message has been sent';
} catch (Exception $e) {
	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}