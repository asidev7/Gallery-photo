document.addEventListener("DOMContentLoaded", function() {
    const gallery = document.querySelector(".gallery");

    // Fonction pour afficher une image en plein écran
    function showFullscreen(imageSrc) {
        const fullscreen = document.createElement("div");
        fullscreen.classList.add("fullscreen");
        const image = document.createElement("img");
        image.src = imageSrc;
        fullscreen.appendChild(image);
        document.body.appendChild(fullscreen);
        fullscreen.addEventListener("click", () => {
            fullscreen.remove();
        });
    }

    // Charger les images depuis la base de données PHP
    fetch("get_images.php")
        .then(response => response.json())
        .then(images => {
            images.forEach(image => {
                const img = document.createElement("img");
                img.src = image.url;
                img.addEventListener("click", () => {
                    showFullscreen(image.url);
                });
                gallery.appendChild(img);
            });
        });
});
