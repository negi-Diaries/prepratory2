<?php
echo "this is delete section";
$id = $_GET['id'];
// fetching all the row of that particular data and getting the image source 
$single_row = $app['queries']->single_data($id);
// grabbing the images of that deleting image 
$fetch_image = $single_row['img_source'];
// calling the delete function and deleting it form the database 
$delete = $app['queries']->delete($id);

if($delete){
        unlink($fetch_image);
        echo "the content has been deleted";
        session_start();
        $_SESSION['deletion'] = "Book Deleted Successfully";
        header("location: home");
    }
?>


<?php 