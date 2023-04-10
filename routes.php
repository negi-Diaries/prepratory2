<?php
// $router->get('', 'controllers/index.php');
// registration routes
$router->get('', 'controllers/auth/registration.php');
$router->get('signup', 'controllers/auth/registration.php');
$router->get('login', 'controllers/auth/login.php');
$router->get('forgot_password', 'controllers/auth/forgot_pass.php');
$router->get('forgot_pass_verification','controllers/auth/forgot_pass_verification.php');
$router->post('code', 'controllers/auth/code.php');
$router->get('logout', 'controllers/auth/logout.php');
$router->get('email_verification', 'controllers/auth/email_verification.php');



$router->get('home', 'controllers/index.php');
$router->get('readmore', 'controllers/readmore.php');
$router->post('edit', 'controllers/edit.php');
$router->get('addbook', 'controllers/addbook.php');
$router->post('addbook', 'controllers/addbook.php');
$router->get('error', 'views/404.php');
$router->get('delete', 'controllers/delete.php');
$router->get('404', 'views/404.php');
?>   