let scrollAmount = 0;

function moveLogos() {
    const logoBand = document.getElementById('logo-band');
    scrollAmount += 1; // Aanpasbare snelheid van scrollen
    if (scrollAmount >= logoBand.scrollWidth / 2) {
        scrollAmount = 0;
    }
    logoBand.scrollLeft = scrollAmount;

    requestAnimationFrame(moveLogos); // Herhaal de animatie
}

requestAnimationFrame(moveLogos);

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 250,
                behavior: 'smooth'
            });
        }
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('#oae, #supply-chain, #partners, #logistieke-boeken');
    const navLinks = document.querySelectorAll('.nav-inner a');

    function changeLinkState() {
        let index = sections.length;
        

        while(--index && window.scrollY + 250 < sections[index].offsetTop) {}

        navLinks.forEach((link) => link.classList.remove('active'));
        if(index >= 0 && index < navLinks.length) {
            navLinks[index].classList.add('active');
        }
    }

    window.addEventListener('scroll', changeLinkState);
});



let pauseAnimation = false; // Nieuwe variabele om bij te houden of de animatie gepauzeerd is

function moveBoeken() {
    const logoBand = document.getElementById('boeken');
    if (!pauseAnimation) { // Check of de animatie niet gepauzeerd is
        scrollAmount += 0.2; // Halveer de scroll snelheid
        if (scrollAmount >= logoBand.scrollWidth / 2) {
            scrollAmount = 0;
        }
        logoBand.scrollLeft = scrollAmount;
    }
    requestAnimationFrame(moveBoeken); // Herhaal de animatie
}

// Evenementen om de animatie te pauzeren/hervatten bij hover
document.getElementById('boeken').addEventListener('mouseenter', function() {
    pauseAnimation = true; // Pauzeer de animatie
});

document.getElementById('boeken').addEventListener('mouseleave', function() {
    pauseAnimation = false; // Hervat de animatie
});

requestAnimationFrame(moveBoeken);