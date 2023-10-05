const $aboutMe = $('#about-me');
const $blackHole = $('#black-hole');

$aboutMe.on('click', function() {
    $blackHole.css('transform', 'scale(2)');
});
