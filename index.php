<!-- TODO: mirar como incluir jQuery en el "npm" -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Loading main JS -->
<script type="module" src="/client/js/main.js"></script>

<!-- Loading main Styles -->
<link rel="stylesheet" href="/client/styles/main.css">
<link rel="stylesheet" href="/client/styles/normalize.css">

<?php
//TODO: mirar para renombrar esto a routes.php
require_once 'config/constants.php';

//Sending Contact mail configuration
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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
    //# DEPRECATED -> Updated folders structure    
    //! require __DIR__ . '/properties/' . $lang_code . '/' . $routes[$request_url] . '.php';
    require __DIR__ . '/properties/' . $routes[$request_url] . '/' . $routes[$request_url] . '_' . $lang_code . '.php';
    $_SERVER['decorate'] = $page . '.php';
    $_SERVER['language'] = $lang_code;
    $_SERVER['route'] = $routes[$request_url];
    require_once 'templates/main.php';

} else {
    // If the URL doesn't match any routes, show a 404 page
    include(ERRORS_ROOT . '404.php');
}

/**
 * Returns an array of links based on the provided language.
 *
 * @param string $lang The language code.
 * @return array The array of links.
 */
function getLinks($lang): array {
    switch ($lang) {
        default:
        case 'en':
            $links = [
                'home_link' => '/en/home',
                'contact_link' => '/en/contact',
            ];
            break;
        case 'es':
            $links = [
                'home_link' => '/es/home',
                'contact_link' => '/es/contact',
            ];
            break;
    }

    return $links;
}

//TODO -> Configure mail sending
/**
 * Send contact mail
 */
function sendContactMail() {
    try {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "smtp.gmail.com";
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // $mail->Port = 587;
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->Username = "fernandoalonso@yahoo.es";
        //TODO -> Añadir al gitignore el archivo de constants y añadir ahi la contraseña
        $mail->Password = "password";

        $mail->setFrom("fernandoalonso@yahoo.es", "Gerar_project");
        $mail->addAddress("fernandoalonso@yahoo.es");

        $mail->Subject = "Gerar_project";
        $mail->Body = "Mail de prueba";

        $mail_sent = $mail->send();

    } catch (\Throwable $th) {
        $hola = "hola";
    }

}