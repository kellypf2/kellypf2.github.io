<!-- Loading main JS -->
<script type="module" src="/JS/main.js"></script>
<!-- TODO: mirar como incluir jQuery en el "npm" -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
//TODO: mirar para renombrar esto a routes.php
require_once 'config/constants.php';

// Define the common pages
$pages = GERARDO_PRIETO_URLS;

// Define the languages
$languages = GERARDO_PRIETO_LANGS;

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

// Check if the requested URL exists in the routes array
if (isset($routes[$request_url])) {
    $page = 'PHP/' . $routes[$request_url];

    // Set the lang selected
    $lang_code = substr($request_url, 1, 2);

    // Include the corresponding page
    require __DIR__ . '/properties/' . $lang_code . '/' . $routes[$request_url] . '.php';
    require_once $page . '.php';

} else {
    // If the URL doesn't match any routes, show a 404 page
    include('PHP/errors/404.php');
}
