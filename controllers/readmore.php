<?php
if($_GET['id']){
    $id = $_GET['id'];
    $data = $app['queries']->single_data($id);
}else{
    header('location: 404');
}

require 'views/readmore.view.php';
?>