<?php
if(isset($_GET['forgot_email'])){
    // echo "incoming <pre>";
    // print_r($_GET);
    $email = $_GET['forgot_email'];
   $fetch_data = $app['queries']->is_email_registered($email);
//    check if the email is present in the database or not 
   if(isset($fetch_data)){

    // print_r($fetch_data);
    $token_time = $fetch_data[0]['reset_token_expired'];
    $updated_time = date("Y-m-d H:i:s", strtotime("+2 hours", strtotime($token_time)));
    date_default_timezone_set('Asia/kolkata');
    $current_time = date("Y-m-d H:i:s", time());
    // now check if the email is valid or invalid 
    if($current_time>$updated_time){
        // echo "invalid email session out";
        session_start();
        $_SESSION['session_out'] = "Session out, link is invalid";
        header('location: forgot_password');
    }else{
        // echo "valid email performing more function";
        require 'views/auth_system/forgot_pass_verification.view.php';
    }
    
   }else{
    echo "Invalid email and verification code";
}
}

?>