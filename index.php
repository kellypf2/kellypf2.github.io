<?php
//TODO: mirar para renombrar esto a routes.php
require_once 'config/constants.php';

// Define the common pages
$pages = [
    'home',
    'about',
    'contact'
];

// Pages that must redirect to another page
$excluded_pages = [
    '' => 'home'
];

// Define the languages
$languages = [
    'en',
    'es'
];

// Generate the routes
$routes = [];
foreach ($languages as $lang) {
    foreach ($pages as $page) {
        $route = '/' . $lang . '/' . $page;
        $routes[$route] = $page;
    }
}

// Get the requested URL
$request_url = $_SERVER['REQUEST_URI'];

//TODO: controlar casos de URLs redirigibles a otras
//# Controlar la redirección por JS, IMPORTANTE redirigir, no nos sirve cargar el contenido correcto sin más, muy malo para el SEO que haya dos URLs con mismo contenido
// $final_url = substr($request_url, 4);
// $banned_urls = array_keys($excluded_pages);
// $lang_url = substr($request_url, 0, 4);

// if(in_array($final_url, $banned_urls)) {
//     $request_url = $lang_url . $excluded_pages[$final_url];

//     $_SESSION['view_lang'] = substr($request_url, 1, 2);
//     header("Location: $excluded_pages[$final_url]");
//     require_once 'PHP/' . $excluded_pages[$final_url] . '.php';
//     exit;
// }

// Check if the requested URL exists in the routes array
if (isset($routes[$request_url])) {
    $page = 'PHP/' . $routes[$request_url];

    // Set the lang selected
    $lang_code = substr($request_url, 1, 2);
    //#DEPRECATED
    // $_SESSION['view_lang'] = $lang_code;

    // Include the corresponding page
    require __DIR__ . '/properties/' . $lang_code . '/' . $routes[$request_url] . '.php';
    require_once $page . '.php';

} else {
    // If the URL doesn't match any routes, show a 404 page
    include('PHP/errors/404.php');
}
