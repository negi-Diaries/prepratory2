<?php

class Router{

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

public static function load($file){
    $router = new Router();
    require $file;
    return $router;
}

public function define($routes){
    // var_dump($routes);
    $this->routes = $routes;
    // var_dump($this->routess);

}

public function get($uri, $controller){
    $this->routes['GET'][$uri] = $controller;
}

public function post($uri, $controller){
    $this->routes['POST'][$uri] = $controller;
}

public function direct($uri, $requestType){
    if(array_key_exists($uri, $this->routes[$requestType])){
        
        return $this->routes[$requestType][$uri];
    }else{
        throw new Exception('no routes found in this uri');
        // return 'views/404.php';
    }
}


public static function method(){
    return $_SERVER['REQUEST_METHOD'];
}

}
?>