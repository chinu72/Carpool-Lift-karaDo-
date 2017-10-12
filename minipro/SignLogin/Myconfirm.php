<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer();

$mail->SMTPDebug = 2;                               // Enable verbose debug output

//$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'liftkarado123@gmail.com';                 // SMTP username
$mail->Password = 'carpool123';                           // SMTP password
//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('liftkarado123@gmail.com', 'Lift KaraDo');
     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Confirmation';
$mail->Body    = 'Your OTP is:1008';
$mail->addAddress('sinha.aryan2963@gmail.com');

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>