<?php 

    $to = "info@kitchen-update.com"; // to email
    $subject = "Form Request";

    //form data
    $first_name = $_POST['name'];
    $last_name = $_POST['surname'];
    $phone = $_POST['phone'];
    $from = $_POST['email'];
    $sbj = $_POST['need'];
    $msg = $_POST['message'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    // VALIDATION ON EXPECTED DATA
    if( 
        !isset($_POST['name']) ||
        !isset($_POST['surname']) ||
        !isset($_POST['city']) ||
        !isset($_POST['zip']) ||
        !isset($_POST['message'])
    ){ 
    died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $message = "Name: $last_name,  $first_name. Message: $msg  \n\n Info: $from Phone: $phone Subj: $sbj \n\n $city - $zip"; 

    //send email
    mail($to, $subject, $message);
    //echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    
    echo '<script language="javascript">';
    echo 'alert("Thank you. We will contact you shortly.")';
    echo '</script>';
    
    echo '<script language="javascript">';
    echo 'window.history.back()';
    echo '</script>';
    
    exit;
?>    