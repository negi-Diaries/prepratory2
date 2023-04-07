<?php

//  for sign up registaration
if(isset($_POST['submit_registration'])){
    echo "<pre>";
    print_r($_POST);
    echo "<pre>";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());
    echo $name;
    echo $email;
    echo $password;
    $is_email_registered = $app['queries']->is_email_registered($email);
    if($is_email_registered>0){
        session_start();
        $_SESSION['email_exists']= "Email Id Already Exists.";
        header('location: signup');
    }else{
        // echo 'you can make the account for email registration';
        $insert_new_user = $app['queries']->add_new_user($name,$email,$password);
        session_start();
        $_SESSION['register_success'] = "Account Registered Successfully";
        $_SESSION['password'] = $password;
        header('location: home');
    }
}
//  code for login 
if(isset($_POST['login_submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    // now we will write the code for login and 
    // check if the user has give the correct details 
    $authenticate_user_password = $app['queries']->authenticate_user_password($email,$password);
    if($authenticate_user_password){
        echo "<pre>";
        print_r($authenticate_user_password);
        session_start();
        $_SESSION['login_successful'] = 'Login Successful';
        $_SESSION['password'] = $password;
        // echo $password;
        header('location: home');
    }else{
        session_start();
        $_SESSION['wrong_empass'] = 'wrong email or password entered';
        header('location: login');
    }
}

?>