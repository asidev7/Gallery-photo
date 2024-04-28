<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Image Gallery</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
        }

        .gallery img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            margin: 10px;
            cursor: pointer;
        }

        .fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fullscreen img {
            max-width: 90%;
            max-height: 90%;
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="#accueil">Accueil</a></li>
            <li><a href="#galerie">Galerie</a></li>
            <li><a href="#apropos">À propos</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
    <div class="gallery">
        <?php
        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "galerie";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to fetch images from database
        $query = "SELECT * FROM images";
        $result = mysqli_query($conn, $query);

        // Fetch images and display
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<img src="' . $row['chemin'] . '" onclick="showFullscreen(\'' . $row['chemin'] . '\')" />';
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </div>

    <script>
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
    </script>
</body>
</html>
