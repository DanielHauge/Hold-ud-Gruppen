<?php

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

 function died($error) {
        // your error code can go here
        echo "Vi er meget kede af, men der var fejl med den formular, du indsendt. ";
        echo "Venligst være opmærksom på følgene.<br /><br />";
        echo $error."<br /><br />";
        echo "Venligst gå tilbage og indtast de oplysninger der mangler.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('Vi beklager, men der er et problem med den formular, du indsendt.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Den e-mail adresse, du har indtastet er ikke gyldig.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Det fornavn, du indtastede er ikke gyldig.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'Det efternavn, du indtastede er ikke gyldig.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'Venligst indtast kommentar.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
    
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

// $mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'smarthomeholdud@gmail.com';                 // SMTP username
$mail->Password = 'Kode12345';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('WebSide-SmartHome', 'SmartHome-Webside');
$mail->addAddress('smarthomeholdud@gmail.com', 'SmartAdmin');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'Kontakt angående smarthome, sendt fra smarthome.dk';
//$mail->Body    = $first_name;
//$mail->Body    = $last_name;
//$mail->Body    = $email_from;
//$mail->Body    = $telephone;
$mail->Body    = $comments;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Tak for du har kontaktet os. Vi vil svare indenfor 24 timer. ';
}

?>