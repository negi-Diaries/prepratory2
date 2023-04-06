<?php

function notifications(){
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
    
}
// echo "end of the alert box";
}

function show_reset_btn(){
    if(isset($_GET["search_btn"])){
        echo '<a type="button" class="btn btn-outline-dark mx-2" href="home">Reset</a>';
    }

}


?>