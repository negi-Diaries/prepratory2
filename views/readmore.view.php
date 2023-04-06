<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>readmore</title>
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
                <!-- <a type="button" class="btn btn-primary mx-2" href="home">Back</a> -->
            </div>
        </div>
    </nav>
    <div class="container sort_add_btn sub_header ">
        <h1>Read more</h1>
        <a type="button" class="btn btn-primary back_btn mx-2" href="home">Back</a>
    </div>
    <form action="addBooks.php" class=" my-3 container" method="POST" enctype="multipart/form-data">
        <div class="formClass my-5">
            <div class="mb-3 container imageSection">
                    <img class="readMoreImage book_img" src="<?php echo $data['img_source'] ?>" alt="bookImage">
                <div id="preview"></div>
            </div>
            <div class="mb-3 container inputFeilds">
                <h4>Book Name</h4>
                <p><?php echo $data['book_name'] ?></p>
                <h4>Author</h4>
                <p><?php echo $data['author'] ?></p>
                <h4>Description</h4>
                <p><?php echo $data['description'] ?></p>
            </div>
        </div>
        <!-- <div class="btnSection">
            <input type="submit" name="submitted" value="save" class="btn btn-primary saveBtn my-3">
        </div> -->
    </form>
        <div class="container flexable edit_delete">
        <form class="d-flex" role="search" method="POST" action="edit">
                   <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <button type="submit" class="btn btn-primary btn_wide" name='submit'>Edit</button> 
                </form>
                <form class="d-flex" role="search" method="GET">
                    <!-- <a type="button" class="btn btn-danger mx-2" href="delete?id=<?php// echo $data['id'] ?>">Delete</a> -->
                    <button type="button" class="btn btn-danger btn_wide mx-2" onclick="delete_box(<?php echo $data['id']; ?>)">Delete</button>
                </form>
        </div>
<!-- <script>
    function delete_box(id){
  let confirmDelete =  confirm('are you sure you want to Delete this');
  console.log(confirmDelete);
  console.log(id);
  if(confirmDelete){
            window.location.href='delete?id='+id;
        }
}
</script> -->
    <script src="public/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>