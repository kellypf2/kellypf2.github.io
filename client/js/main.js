// Define the URLs to check
$(document).on('ready', function() {
    // Define the URLs to check
    const url_mapping = {
        '/': '/en/home',
        '/en': '/en/home',
        '/en/': '/en/home',
        '/es': '/es/home',
        '/es/': '/es/home'
    };

    // Get the current URL path
    const current_path = window.location.pathname;

    // Check if the current URL is in the mapping
    if (url_mapping.hasOwnProperty(current_path)) {
        // Perform the redirect to the desired URL
        window.location.href = url_mapping[current_path];
    }
    
});

let nav_button = $(".nav-button");

nav_button.on('click', function() { 
    $('body').toggleClass("nav-visible");
});
