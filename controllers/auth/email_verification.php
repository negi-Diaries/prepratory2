<?php 
// echo "this is email verification ";
// echo "<pre>";
// print_r($_GET);
if(isset($_GET['email']) && isset($_GET['v_code'])){
    $email = $_GET['email'];
    $v_code = $_GET['v_code'];
    $result = $app['queries']->email_verification($email, $v_code);
    // now check if the result is true or not 
    if($result){
        $row_count = count($result);
        // now check if there's is only one row of the result or more than one row of there's zero row 
        // and also check that the row is verified or not  
        if($row_count == 1){
            // now check that the email is verified or not 
            if($result[0]['is_verified'] == 0 ){
            $mark_email_verified = $app['queries']->mark_email_verified($email);
            // another is for checking if the email is now verified or not 
            if($mark_email_verified){
                // now the account is verified 
                // echo "<h2>your account is verified</h2>";
                // echo "<h3>Go to the login page to login <a href='login'>Login</a></h3>";
                session_start();
                $_SESSION['account_verified'] = "Your account is verified, please login.";
                header('location: login');
            }else{
                echo "unable to verify account";
            }
            }else if($result[0]['is_verified'] == 1){
                // if the email is already verified then this code will run
                session_start();
                $_SESSION['account_verified'] = "Your account is already verified.";
                header('location: login');
                // echo "<h2>Your email is already been verified</h2>";
                // echo "<h3>Go to the login page <a href='login'>Login</a></h3>";
            }
        }else if($row_count > 1){
            echo "Please contact the customer support as there are more than one users with the same email";
        }
    }else{
        echo "Invalid email and verification code";
    }
}


?>

