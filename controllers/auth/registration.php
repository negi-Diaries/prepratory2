<?php
if(isset($_POST['submit_registration'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "<pre>";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $name;
    echo $email;
    echo $password;
}
require 'views/auth_system/registration.view.php';
?>