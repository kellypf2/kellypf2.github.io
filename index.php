<?php

//TODO: mirar pa renombrar esto a routes.php
//TODO: configurar constants.php

// Define the routes
$projectPath = getcwd();
$routes = [
    '/' => 'PHP/home.php',
    '/about' => 'PHP/about.php',
    '/contact' => 'PHP/contact.php'
];

// Get the requested URL
$requestUrl = $_SERVER['REQUEST_URI'];

// Check if the requested URL exists in the routes array
if (array_key_exists($requestUrl, $routes)) {
    $page = $routes[$requestUrl];
    include($page);
} else {
    // If the URL doesn't match any routes, show a 404 page
    include('PHP/errors/404.php');
}

?>