console.log("czesc");
 document.addEventListener("DOMContentLoaded", function() {
    const images = this.querySelectorAll('.banner  img');
    let currentImageIndex = 0;

    setInterval(() => {
        const currentImage = images[currentImageIndex];
        const nextImageIndex = (currentImageIndex + 1) % images.length;
        const nextImage = images[nextImageIndex];

        currentImage.classList.remove('active');
        nextImage.classList.add('active');
        currentImageIndex = nextImageIndex;
    }, 10000);
 })

 