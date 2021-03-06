<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   empty($_POST['plan'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$plan = strip_tags(htmlspecialchars($_POST['plan']));
   
// Create the email and send the message
$to = 'arteyregalostore@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto en la pagina de:  $name";
$email_body = "<strong>Detalles:</strong><br/>Nombre: $name<br/>Email: $email_address<br/>Telefono: $phone<br/>Plan: $plan<br/>Mensaje: $message";

$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPDebug = 1;
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'arteyregalostore@gmail.com';                 // SMTP username
$mail->Password = '0002040600';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('arteyregalostore@gmail.com', 'Mailer');
$mail->addAddress('arteyregalostore@gmail.com');     // Add a recipient
$mail->addReplyTo($email_address);
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $email_subject;
$mail->Body = $email_body;
$mail->AltBody = $email_body;

if(!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    return false;
} else {
    return true;
}
?>
