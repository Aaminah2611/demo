<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// ✅ Strip out the '/demo' part so routes match
$uri = str_replace('/demo', '', $uri);

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];



function routeToController($uri, $routes){
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);
 
    require "views/{$code}.php";

    die();

}

routeToController($uri, $routes);
