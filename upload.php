<?php

require_once './phpmailer/phpmailer.php';

$to = "info@kitchen-update.com";
$subject = "Form Request";

$fromName = $_POST['fname']; 
$fromLName = $_POST['lname']; 
$email = $_POST['email']; 
$phone = $_POST['phone'];
$city = $_POST['city']; 
$zip = $_POST['zip'];
$msg = $_POST['msg'];
$uploads = $_FILES['files'];

// VALIDATION ON EXPECTED DATA
if( !isset($_POST['fname']) ||
    !isset($_POST['lname']) ||
    !isset($_POST['email']) ||
    !isset($_POST['phone']) ||
    !isset($_POST['city']) ||
    !isset($_POST['zip']) ||
    !isset($_POST['msg']) ||
    !isset($_FILES['files']) 
){ 
    died('We are sorry, but there appears to be a problem with the form you submitted.');
}

$message = "Name: $fromLName,  $fromName . Message: $msg  \r\n Phone: $phone Email: $email City: $city Zip: $zip";

$mail = new PHPMailer;
$mail->AddAddress($to);
$mail->MsgHTML($message);
$mail->Subject = $subject;
$mail->From = $email;

$attachment = [];
foreach ($uploads['error'] as $key => $error) {
    if ($error == 0) {
        if (move_uploaded_file($uploads['tmp_name'][$key], dirname(__FILE__) . '/tmp_images/' . $uploads['name'][$key])) {
            $attachment[] = dirname(__FILE__) . '/tmp_images/' . $uploads['name'][$key];
            $mail->AddAttachment(dirname(__FILE__) . '/tmp_images/' . $uploads['name'][$key]);
        }
    }
}

if ($mail->Send()) {
    foreach ($attachment as $item) {
        unlink($item);
    }
}

//attachment



// EMAIL HEADERS
//@mail($to, $subject, $message);

echo '<script language="javascript">';
echo 'alert("Thank you. We will contact you shortly.")';
echo '</script>';
    
echo '<script language="javascript">';
echo 'window.history.back()';
echo '</script>';   
exit;
?>