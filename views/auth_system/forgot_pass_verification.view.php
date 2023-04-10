<?php
session_start();
if(isset($_SESSION['logged_in'])){
    header('location: home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <?php require 'views/partials/fonts.php' ?>
    <link rel="stylesheet" href="public/css/form.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href=""><img class="coloured_cow_img" src="public/logo/open_library.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <!-- <a type="button" class="btn btn-primary" href="home">Back</a> -->
                </form>
            </div>
        </div>
    </nav>
    <div class="formDiv">
        <div class="formDiv_internal forgot_password">
            <h3 class="mainHeading">Enter New Password</h3>
            <p class="genres">Please Enter a new password and don't forgot this time.</p>
            <form class="form form_container" action="code" method="post" name="userLogin"
                onsubmit="return formValidationNewPassword()">
                <div class="mainHeading">
                    <div class="input_common">
                        <input class="inputFeilds" type="password" name="update_password" placeholder="Password" id="password">
                        <b>
                            <p class="error" id="passwordErr"></p>
                        </b>
                    </div>
                    <!-- <br> -->
                </div>
                <input type="hidden" name="email" value="<?php echo $email; ?>">

                <div class="input_common divBtn">
                    <!-- <input id="submitBtn" class="btn btn-primary" type="submit" name="submit" value="Sign Up"> -->
                    <button id="submitBtn" class="btn btn-primary" type="submit" name="update_password_submit"
                        value="forgot_submit">Send link</button>
                </div>
            </form>
        </div>
    </div>
    <script src="public/script/form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>