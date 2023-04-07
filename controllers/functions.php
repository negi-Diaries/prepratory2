<?php

function alerts(){
// echo "hello world this is notification box";
// there's no need to start the sessin again as it will throw us an error 
// session_start();
if(isset($_SESSION['success'])) {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>". $_SESSION['success']  ."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    unset($_SESSION['success']);
}elseif(isset($_SESSION['updation'])){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>". $_SESSION['updation']  ."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    unset($_SESSION['updation']);
}elseif(isset($_SESSION['deletion'])){
echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>". $_SESSION['deletion']  ."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
unset($_SESSION['deletion']);
}elseif(isset($_SESSION['blank_string'])){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>".$_SESSION['blank_string']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
unset($_SESSION['blank_string']);
// header("location: home");
}else if(isset($_SESSION['sort_null'])){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>".$_SESSION['sort_null']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    unset($_SESSION['sort_null']);
    header("location: home");
    // form here the registrations starts  session starts
}else if(isset($_SESSION['email_exists'])){
        echo "<p class='error' id='emailErr'>".$_SESSION['email_exists']."</p>";
        unset($_SESSION['email_exists']);
}elseif(isset($_SESSION['register_success'])){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>".$_SESSION['register_success']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
unset($_SESSION['register_success']);
}else if(isset($_SESSION['wrong_empass'])){
    echo "<p class='error' id='emailErr'>".$_SESSION['wrong_empass']."</p>";
    unset($_SESSION['wrong_empass']);
}else if(isset($_SESSION['login_successful'])){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>".$_SESSION['login_successful']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
unset($_SESSION['login_successful']);
}
// echo "end of the alert box";    
}

function show_reset_btn(){
    if(isset($_GET["search_btn"])){
        echo '<a type="button" class="btn btn-outline-dark mx-2" href="home">Reset</a>';
    }

}


?>