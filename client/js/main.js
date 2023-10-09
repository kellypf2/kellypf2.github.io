// Define the URLs to check
$(document).ready(function() {
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


const $about_me = $('#about-me');
const $black_hole = $('#black-hole');

$about_me.on('click', function() {
    $black_hole.css('transform', 'scale(2)');
});
