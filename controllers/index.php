<?php

session_start();
// in the home page there are searching sorting and we will show all the books 
// sorting section 
if(isset($_GET['sort_alphabet'])){
    $sort_option = "";
    // nested if else statement for sorting
    if($_GET['sort_alphabet'] == 'a-z'){
      $sort_option = "ASC";
    }else if($_GET['sort_alphabet'] == 'z-a'){
      $sort_option = "DESC";
    }else if($_GET['sort_alphabet'] == '--sort--'){
      // session_start();
      $_SESSION['sort_null'] = "Please select a valid sort";
      // header("location: home");
    }else{
      $_SESSION['sort_null'] = "Please select a valid sort";
    }
    $total_records = $app['queries']->total_records('bookdetails');
    $limit = 8;
    $total_pages = ceil($total_records/$limit);
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage -1) * $limit;
    $data = $app['queries']->sort($sort_option,$limit,$offset);


  }else if(isset($_GET["search_btn"]) && !isset($_GET['sort_alphabet'])){
    $unprocessed_data = ucwords($_GET['search_input']);
    $search_word = '%'.$unprocessed_data.'%';
    // here is the pagination details 
    $total_records = $app['queries']->search_count($search_word);  // first we will count how many related data is there
    // $total_records = $app['queries']->total_records('bookdetails');
    $limit = 8;
    $total_pages = ceil($total_records/$limit);
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage -1) * $limit;
    // make the search query for the search button 
    $data = $app['queries']->search($search_word,$limit,$offset);
    // nested if else in searching 
    if($_GET['search_input'] == null){
      header("location: home");
    }
    
  }else{
    $total_records = $app['queries']->total_records('bookdetails');
    $limit = 8;
    $total_pages = ceil($total_records/$limit);
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage -1) * $limit;
  
    $data = $app['queries']->selectAll('bookdetails',$limit,$offset);
  }
  
  
  // var_dump($data);
  require 'views/index.view.php';
?>
