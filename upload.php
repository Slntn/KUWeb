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
    !isset($_FILES['files']) 
){ 
    died('We are sorry, but there appears to be a problem with the form you submitted.');
}

$message = "Name: $fromLName,  $fromName . Message: $msg  \n\n Phone: $phone Email: $email"; 
$message .= "Uploads: ".clean_string($uploads)."\n";

$boundary = md5("random"); // define boundary with a md5 hashed value 

//attachment 
$message .= "--$boundary\r\n"; 
$message .="Content-Type: $file_type; name=".$file_name."\r\n"; 
$message .="Content-Disposition: attachment; filename=".$file_name."\r\n"; 
$message .="Content-Transfer-Encoding: base64\r\n"; 
$message .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";  
$message .= $encoded_content; // Attaching the encoded file with email 

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