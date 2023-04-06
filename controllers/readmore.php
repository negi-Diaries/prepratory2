<?php

$id = $_GET['id'];
$data = $app['queries']->single_data($id);

require 'views/readmore.view.php';
?>