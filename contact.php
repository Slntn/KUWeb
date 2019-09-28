<?php 

    $to = "slntn@yahoo.com"; // to email
    $subject = "Form Request";

    //form data
    $first_name = $_POST['name'];
    $last_name = $_POST['surname'];
    $phone = $_POST['phone'];
    $from = $_POST['email'];
    $sbj = $_POST['need'];
    $msg = $_POST['message'];

    $message = "Name: $last_name,  $first_name. Message: $msg  \n\n Info: $from Phone: $phone Subj: $sbj"; 

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