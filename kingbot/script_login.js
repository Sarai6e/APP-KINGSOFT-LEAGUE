document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".background-slider img");
    let currentImageIndex = 0;

    // Comienza mostrando la primera imagen
    images[currentImageIndex].style.opacity = 1;

    setInterval(() => {
        images[currentImageIndex].style.opacity = 0; // Oculta la imagen actual
        currentImageIndex = (currentImageIndex + 1) % images.length;
        images[currentImageIndex].style.opacity = 1; // Muestra la siguiente imagen
    }, 3000);
});
