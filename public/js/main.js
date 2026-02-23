// === NAVBAR SCROLL EFFECT ===
window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});



// === HERO SLIDER ===
let currentSlide = 0;
const slides = document.querySelectorAll(".hero-slide");

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle("active", i === index);
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

if (slides.length > 0) {
    showSlide(currentSlide);
    setInterval(nextSlide, 5000); // ganti slide tiap 5 detik
}

// === NAVBAR ACTIVE STATE ===
function setActiveNav() {
    const navLinks = document.querySelectorAll('.navbar .nav-link');
    const sections = document.querySelectorAll('section[id]');
    let current = '';

    // Find the current section
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100; // adjust for navbar height + some padding
        const sectionHeight = section.offsetHeight;
        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
            current = section.getAttribute('id');
        }
    });

    // Remove active from all
    navLinks.forEach(link => {
        link.classList.remove('active');
    });

    // Set active based on current section
    if (current) {
        navLinks.forEach(link => {
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('active');
            }
        });
    } else {
        // At top, set Beranda active
        navLinks.forEach(link => {
            if (link.getAttribute('href') === window.location.origin + '/' || link.textContent.trim() === 'Beranda') {
                link.classList.add('active');
            }
        });
    }
}

window.addEventListener('scroll', setActiveNav);
document.addEventListener('DOMContentLoaded', setActiveNav);

document.addEventListener("DOMContentLoaded", function () {
    console.log("Website ready!");
});
