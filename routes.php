<?php
// $router->get('', 'controllers/index.php');
// registration routes
$router->get('', 'controllers/auth/registration.php');
$router->get('login', 'controllers/auth/login.php');
$router->get('signup', 'controllers/auth/registration.php');
$router->get('forgot_password', 'controllers/auth/forgot_pass.php');




$router->get('home', 'controllers/index.php');
$router->get('readmore', 'controllers/readmore.php');
$router->post('edit', 'controllers/edit.php');
$router->get('addbook', 'controllers/addbook.php');
$router->post('addbook', 'controllers/addbook.php');
$router->get('error', 'views/404.php');
$router->get('delete', 'controllers/delete.php');
// note- i have fix the addbook post method by simply changing the html form to post 
// but remember we have fix the edit section also which is also the post method


?>   