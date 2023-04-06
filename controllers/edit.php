<?php
// fetching the id and passing it to single-data function 
// which is generally clicking on edit button and taking details 
// of that particular database and populating it
if (isset($_POST['id'])){
    $id = $_POST['id'];
    $data = $app['queries']->single_data($id);
    }
    // check if the user has clicked on the update button and the button name is submitted 
    // and has filled all the details in the input feild and we also check that all the feilds 
    // sholud not be empty 
    if(isset($_POST['submitted'])){   
        if($_POST['bookname'] == '' || $_POST['author'] == '' || $_POST['description'] == ''){
            echo "please enter all the details";
          }else{
        $id = $_POST['book_id'];
        $bookname = $_POST['bookname'];
        $author = strtoupper($_POST['author']);
        $description = $_POST['description'];
        $old_image = $_POST['old_image'];
        // check if user has uploaded a new image so that we can update it and delete old image 
        if($_FILES['uploaded_image']['name'] != null){
            $updated_image = $_FILES["uploaded_image"]["name"];
            $tempName =  $_FILES["uploaded_image"]["tmp_name"];
            $folder = 'images/'.$updated_image;
            // var_dump($_FILES);
        }else{
            $updated_image = $old_image;
            $folder = $updated_image;
        }
        // taking all the variables and storing then in an array 
        $update_details = [
            'image_source' => $folder,
            'book_name' => $bookname,
            'author' => $author,
            'description' => $description,
            'id' => $id
        ];
        $table_name = 'bookdetails';
        // calling the update class of the querybuilder 
        $result = $app['queries']->update($table_name, $update_details);
        // if the book is updated then we delete the old book image 
             if($result){
                if($_FILES['uploaded_image']['name'] != null){
                    move_uploaded_file($tempName, $folder);
                    unlink($old_image);
                }
                session_start();
                $_SESSION['updation'] = "Book Updated Successfully";
                header("location: home");
             }else{
                echo "form not submitted";
             }
    
            }
    }
    


require 'views/edit.view.php'
?>