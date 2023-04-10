<?php
// here is the mail section 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// sendMail function  
function sendMail($email_mail,$v_code_mail){
    require('PHPMailer/Exception.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/PHPMailer.php');

    $mail = new PHPMailer(true);

    try {
        // dfyhwxvzbgcigime
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'vn03485@gmail.com';                     //SMTP username
        //Its always At remove the passkey when you are uploading it Top to the github as anyone can access it
        $mail->Password   = 'dfyhwxvzbgcigime';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('vn03485@gmail.com', 'OPEN LIBRARY');
        $mail->addAddress($email_mail);     //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification From Open Library';
        $mail->Body    = "Thanks for registration!
        <br> Click the link to verify the email address
        <a href='http://localhost/prepratory2/email_verification?email=$email_mail&v_code=$v_code_mail'>Verify</a>
        ";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        // echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        return false;
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


//  for sign up registaration
if(isset($_POST['submit_registration'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // now calling the query 
    $num_rows = $app['queries']->is_email_registered_count($email);
    // this is the first nested if statement 
    if($num_rows>0){
        // die('email is registered');
        session_start();
        $_SESSION['email_exists']= "Email Already Registered.";
        header('location: signup');
    }else{
        $v_code = bin2hex(random_bytes(16));
        // echo 'here you can make the account for email registration';
        $insert_new_user = $app['queries']->add_new_user($name,$email,$password,$v_code,0);
        // this is the second if statement
        if($insert_new_user && sendMail($email,$v_code)){
            session_start();
            $_SESSION['verify_email'] = "Please check your registered email.";
            header('location: signup');
            // echo "<h1>please check Your email</h1>";
            // echo "<h3>click here to go to <a href='login'>login</a></h3>";
            // die('end here');
            // session_start();
            // $_SESSION['register_success'] = "Account Registered Successfully";
            // $_SESSION['logged_in'] = true;
            // header('location: home');
        }else{
            session_start();
            $_SESSION['server_down'] = "Server down, data cannot be inserted";
            header('location: signup');
        }
    }
    // this first nested if statement ends here 
}

//  code for login 
if(isset($_POST['login_submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    // check if the email is registered or not
    $is_email_registered = $app['queries']->is_email_registered($email);
    // now check is_email_registered return true or not 
    if($is_email_registered){ 
        $row_count = count($is_email_registered);
        // now check if there's multiple email accounts with the same email 
        if($row_count ==1){
            // check the form email is equal to the database email 
            if($is_email_registered[0]['email'] == $email){
                // now check if the user has verified email or not 
                if($is_email_registered[0]['is_verified'] == 1){

                    // now we will check if the password is matched with user password in nested if 
                    if($is_email_registered[0]['password'] == $password){
                // die("this is the home page");
                session_start();
                $_SESSION['login_successful'] = 'Login Successful';
                $_SESSION['logged_in'] = true;
                header('location: home');
            }else{
                session_start();
                $_SESSION['wrong_password'] = 'Incorrect Password Entered';
                header('location: login');
            }
        }else{
            $v_code = $is_email_registered[0]['verification_code'];
            sendMail($email,$v_code);
            session_start();
            $_SESSION['not_verified'] = "please verify your account first, an email has been sent.";
            header('location: login');
            // echo "your email is not verified please verify your account to  login";
        }
            }
            // if there are more than one users the we will perform this statement
        }else if($row_count>1){
            echo "Please contact to the customer care as there are multiple accounts with the same email ";
        }

    }else{
        session_start();
        $_SESSION['wrong_empass'] = 'wrong email entered';
        header('location: login');
    }
}

// forgot mail 
function sendForPassMail($email_mail,$reset_token_mail){
    require('PHPMailer/Exception.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/PHPMailer.php');

    $mail = new PHPMailer(true);

    try {
        // dfyhwxvzbgcigime
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'vn03485@gmail.com';                     //SMTP username
        //Its always At remove the passkey when you are uploading it Top to the github as anyone can access it
        $mail->Password   = 'dfyhwxvzbgcigime';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('vn03485@gmail.com', 'OPEN LIBRARY');
        $mail->addAddress($email_mail);     //Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link From Open Library';
        $mail->Body    = "We got a request from you to reset your password.
        <br> Click the link to verify the email address and change the password
        <a href='http://localhost/prepratory2/forgot_pass_verification?forgot_email=$email_mail&reset_token=$reset_token_mail'>Verify</a>
        ";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        // echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        return false;
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// code for forgot password 
if(isset($_POST['forgot_submit'] )){
    $email = $_POST['email'];
    $search_email = $app['queries']->is_email_registered($email);
    if($search_email){
        $row_count = count($search_email);
        // check if there is a single row or multiple rows 
        if($row_count == 1){
            // from here the main code will implemented 
            echo '<pre>';
            print_r($search_email);
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $current_time = date("Y-m-d H:i:s", time());
            // echo "under thiss";
            // echo date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s", time())));

            // $updated_time = date("Y-m-d H:i:s", strtotime("+2 hours", strtotime($current_time)));
            echo $current_time;
            // now insert the token and date for token expiration                                                
            $update_reset_token_and_expiration = $app['queries']->update_reset_token_and_expiration($reset_token,$current_time,$email);
            // now check if its true or not 
            if(isset($update_reset_token_and_expiration) && sendForPassMail($email,$reset_token)){
                session_start();
                $_SESSION['forgot_mail'] = "Please check your mail and verify";
                header('location: forgot_password');
                // echo "query updated successfully <br>";

            }else{
                session_start();
                $_SESSION['server_down'] = "Server down, data cannot be processed";
                header('location: forgot_password');
            }
            
            
            
        }else if($row_count>1){
            echo "Please contact to the customer care as there are multiple accounts with the same email.";
        }
    }else{
        session_start();
        $_SESSION['wrong_empass'] = 'wrong email entered';
        header('location: forgot_password');
    }
}

// code for new password
if(isset($_POST['update_password_submit'])){
    $email = $_POST['email'];
    $updated_password = $_POST['update_password'];
    $update_password = $app['queries']->update_password($email,$updated_password);
    if($update_password){
        echo "password has been updated successfully";
        session_start();
        $_SESSION['password_updated'] = 'Password updated successfully';
        header('location: login');
    }else{
        echo "query not updated ";
        session_start();
        $_SESSION['server_down'] = "Server down, data cannot be processed";
        header('location: forgot_password');
    }
}

?>