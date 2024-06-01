
    document.addEventListener('DOMContentLoaded', function() {
        const videos = document.querySelectorAll('.bg-video');
        let currentVideoIndex = 0;

        videos[currentVideoIndex].classList.add('active');

        setInterval(() => {
            videos[currentVideoIndex].classList.remove('active');
            currentVideoIndex = (currentVideoIndex + 1) % videos.length;
            videos[currentVideoIndex].classList.add('active');
        }, 5000); // Cambia cada 5 segundos
    });

