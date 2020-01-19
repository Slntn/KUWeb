<?php

$to = "info@kitchen-update.com";
$subject = "Form Request";

$fromName = $_POST['fname']; 
$fromLName = $_POST['lname']; 
$email = $_POST['email']; 
$phone = $_POST['phone'];
$msg = $_POST['msg'];
$uploads = $_FILES['files'];

// VALIDATION ON EXPECTED DATA
if( !isset($_POST['fname']) ||
    !isset($_POST['lname']) ||
    !isset($_POST['email']) ||
    !isset($_POST['phone']) ||
    !isset($_POST['msg']) ||
    !isset($_POST['files']) 
){ 
    died('We are sorry, but there appears to be a problem with the form you submitted.');
}

$message = "Name: $fromLName,  $fromName . Message: $msg  \n\n Phone: $phone Email: $email"; 
$message .= "Uploads: ".clean_string($uploads)."\n";

// EMAIL HEADERS
@mail($to, $subject, $message); 

echo '<script language="javascript">';
echo 'alert("Thank you. We will contact you shortly.")';
echo '</script>';
    
echo '<script language="javascript">';
echo 'window.history.back()';
echo '</script>';   
exit;
?>