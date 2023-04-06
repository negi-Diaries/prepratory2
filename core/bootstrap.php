<?php
$app = [];
$app['config'] = require 'config.php';
$app['config'];
// var_dump($config);
require 'core/Router.php';
require 'core/Request.php';
require 'core/database/connection.php';
require 'core/querybuilder.php';
// connect the database 
$pdo = connection::make($app['config']['database']);
$app['pdo_object'] = connection::make($app['config']['database']);
// inserted querbuilder class in $app array 
$app['queries'] = new querybuilder($pdo);
?> 