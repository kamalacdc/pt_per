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
document.addEventListener("DOMContentLoaded", function () {
    console.log("Website ready!");
});
