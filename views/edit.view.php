<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
                <form class="d-flex" role="search">
                    <!-- <a type="button" class="btn btn-primary" href="home">Back</a> -->
                </form>
            </div>
        </div>
    </nav>
    <div class="container sort_add_btn sub_header">
        <h1>Edit Book</h1>
        <a type="button" class="btn btn-primary back_btn mx-2" href="home">Back</a>
    </div>


    <form action="" class=" my-3 container" method="POST" enctype="multipart/form-data">
        <div class="formClass">
            <div class="mb-3 container inputFeilds">
                <input type="hidden" name="book_id" value="<?php echo $data['id']; ?>">
                <label for="book" class="form-label my-2">Book Name</label>
                <input type="text" class="form-control my-2" id="book" name="bookname"
                    value="<?php echo $data['book_name'] ?>">
                <label for="author" class="form-label my-2">Author</label>
                <input type="text" class="form-control my-2" id="author" name="author"
                    value="<?php echo $data['author'] ?>">
                <label for="description" class="form-label my-2">Description</label>
                <textarea class="form-control my-2" id="description" rows="8"
                    name="description"><?php echo $data['description'] ?></textarea>
            </div>
            <div class="mb-3 container imageSection">
                <img class="imagePreview" src="<?php echo  $data['img_source']; ?>" alt="">
                <h6>old image</h6>
                <input id="uploadFile" onchange="getImagepreview(event)" class="imageInput" type="file"
                    name="uploaded_image">
                <div id="preview">
                    <input type="hidden" name="old_image" value="<?php echo $data['img_source']; ?>">
                </div>
                <div class="imageSection">
                    <h6 id="select_img_alert" class="my-2">Choose An Image To Preview</h6>
                    <h6  class="">New Image</h6>
                </div>

            </div>
        </div>
        <div class="btnSection">
            <input type="submit" name="submitted" value="Update" class="btn btn-primary saveBtn btn_wide my-3">
        </div>
    </form>

    <script src="public/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>