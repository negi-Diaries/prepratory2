<?php

if(isset($_POST["submitted"])){
          if($_POST['bookname'] == '' || $_POST['author'] == '' || $_POST['description'] == '' || $_FILES["imageupload"]["name"] == ''){
            // echo "please enter all the details";
          }else{
        $bookname = ucwords($_POST['bookname']);
        $author = strtoupper($_POST['author']);
        $description = ucfirst($_POST['description']);
        $fileName = $_FILES["imageupload"]["name"];
        $tempName =  $_FILES["imageupload"]["tmp_name"];
        $folder = 'images/'.$fileName;
        // taking all the data into an array and passing it as a parameter in insert function 
        $insert_data = [
            'img_source' => $folder,
            'book_name' => $bookname,
            'author' => $author,
            'description' => $description
        ];
        $side_effects = [
            'folder' => $folder,
            'tempname' => $tempName
        ];
        $table_name  = 'bookdetails';
        $data = $app['queries']->insert($table_name, $insert_data, $side_effects);
        if($data != null){
          // echo 'working';
          session_start();
          $_SESSION['success'] = 'Book Added Successfully!';
          header("location: home");

          
        }
      }
    }
  function alert_validation(){
    if(isset($_POST["submitted"])){
      if($_POST['bookname'] == '' || $_POST['author'] == '' || $_POST['description'] == '' || $_FILES["imageupload"]["name"] == ''){
        // echo "please enter all the details";
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Please Enter All The Feilds.</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
    }
  }  
    
    require 'views/addbook.view.php';
?>