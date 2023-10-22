<!-- Loading main JS -->
<script type="module" src="/client/js/main.js"></script>
<!-- TODO: mirar como incluir jQuery en el "npm" -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Loading main Styles -->
<link rel="stylesheet" href="/client/styles/main.css">
<link rel="stylesheet" href="/client/styles/normalize.css">

<?php
//TODO: mirar para renombrar esto a routes.php
require_once 'config/constants.php';

// Define the common pages
$pages = GERARDO_PRIETO_URLS;

// Define the languages
$languages = GERARDO_PRIETO_LANGS;

// Generate the routes
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
    $page = COMPONENTS_ROOT . $routes[$request_url];

    // Set the lang selected
    $lang_code = substr($request_url, 1, 2);

    // Include the corresponding page
    require __DIR__ . '/properties/' . $lang_code . '/' . $routes[$request_url] . '.php';
    $_SERVER['decorate'] = $page . '.php';
    $_SERVER['language'] = $lang_code;
    $_SERVER['route'] = $routes[$request_url];
    require_once 'templates/main.php';

} else {
    // If the URL doesn't match any routes, show a 404 page
    include(ERRORS_ROOT . '404.php');
}
