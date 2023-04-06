<?php
 $database = require 'core/bootstrap.php';

// echo "<pre>";
// var_dump($app);
$router =  Router::load('routes.php');
// Request::uri() is coming from Request.php it fetches the current uri path and process it
require $router->direct(Request::uri(), Router::method());
// var_dump($router->direct(Request::uri(), Router::method()));


?> 
