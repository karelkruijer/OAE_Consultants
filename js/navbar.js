document.querySelector('.hamburger-menu').addEventListener('click', function() {
    document.querySelector('.nav-links').classList.toggle('active');
    document.querySelector('#background-slider').classList.toggle('active');
    document.querySelector('.hamburger-menu').classList.toggle('active');
});

document.addEventListener("DOMContentLoaded", function() {
    const images = [
        'url("img/iStock-1328317040.jpg")',
        'url("img/iStock-1249085781.jpg")',
        'url("img/iStock-1407976114.jpg")',
        'url("img/iStock-1481069966.jpg")'
    ];

    let currentIndex = 0;
    const backgroundElement = document.getElementById('background-slider');

    // Functie om de achtergrondafbeelding te wijzigen
    function changeBackground() {
        backgroundElement.style.backgroundImage = images[currentIndex];
        currentIndex = (currentIndex + 1) % images.length; // Verplaats naar de volgende afbeelding
    }

    // Stel de eerste afbeelding in en start de interval
    changeBackground();
    setInterval(changeBackground, 10000); // Wissel elke 10 seconden
});