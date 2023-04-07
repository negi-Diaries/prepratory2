<?php
if(!$_SESSION['password']){
    header('location: login');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <?php require 'views/partials/fonts.php' ?>
    <link rel="stylesheet" href="public/index.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
                    <a class="navbar-brand" href="home"><img class="coloured_cow_img" src="public/logo/open_library.svg"
                    alt=""></a>
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

                <form class="d-flex" role="search" method="GET" action="">
                    <input class="form-control me-2" name="search_input" type="search" placeholder="Search"
                        aria-label="Search">
                    <button type="submit" class="btn btn-outline-success search_btn" name="search_btn"><img
                            class="search_logo  btn-outline-success" src="public/logo/search_icon.svg"
                            alt="Logo"></button>

                </form>
                <?php show_reset_btn(); ?>
                <a class="btn btn-primary btn_wide mx-2" href="logout">Logout</a>
                <!-- <button type="submit" class="btn btn-primary btn_wide" name='submit'>Edit</button>  -->
            </div>
        </div>
    </nav>
    <!-- notification box  -->
    <div class="notification_box">
        <!-- if someone clicks on the search box with an empty input then an alert will be shown up  -->
        <?php
        alerts();
        ?>
    </div>
    <!-- notification box ends -->

    <!-- sorting section starts  -->
    <div>
    <div class="container  sort_add_btn">
        <form class="sorting_form" action="home" method="GET">
            <div class="input-group">
                <select name="sort_alphabet" class="form-control select">
                    <option>--sort--</option>
                    <option value="a-z"
                        <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == 'a-z'){ echo "selected";} ?>>
                        A-Z(Ascending Order)</option>
                    <option value="z-a"
                        <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == 'z-a'){ echo "selected";} ?>>
                        Z-A(Descending Order)</option>
                </select>
                <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Filter</button>
            </div>
        </form>
        <div>
            <form action="addbook" method="GET">
                <button class="add_book btn btn-primary" type="submit" class="btn btn-primary ">Add a Book</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- sorting section ends  -->
    <!-- user will see what he has searched -->
    <div class="container flexable">
        <?php
    if(!$data){
        echo "no data found";
    }
    ?>
    </div>
    <!-- here the main div starts  -->
    <div class="container sub_header flexable mainDiv">
        <?php
           foreach ($data as $item): 
          ?>
        <div class="card my-4 " style="width: 18rem;">
            <img class="book_img" src="<?php echo $item['img_source']; ?>" class="card-img-top" alt="...">
            <h4 class="bookNamecenter my-1"><span></span><?php echo $item['book_name']; ?></h4>
            <div class="more">
                </div>
                <span>author:</span>
                <h5 class="card-title"><?php echo $item['author']; ?></h5>
                <div class="book_details">
                    <!-- <form action="readmore?id=<?php echo $item['id']; ?>" method="POST"> -->
                        <a href="readmore?id=<?php  echo $item['id']; ?>">Book details</a>
                        <!-- <input type="submit" name="submit" value="Book Details"> -->
                        <!-- <a href="readmore?id=<?php// echo $item['id']; ?>">Book details</a> -->

                    <!-- </form> -->
                </div>
        </div>
        <?php 
            endforeach; ?>
    </div>
    <!-- pagination starts from here -->
    <div class="container flexable">
        <?php
    require 'controllers/pagination_links.php';
    ?>
    </div>
    <!--  pagination ends -->
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>