<?php
// Absolute path to the folder on your server
$photo_dir = '/var/www/vjbe.net/html/oldnews-photos/1844/mercury';

// Base URL that corresponds to that folder
$photo_url_base = 'https://vjbe.net/oldnews-photos/1844/mercury';

// Scan the directory for image files
$images = glob($photo_dir . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mercury Photos</title>
    <style>
        body {
            text-align: center; /* center everything */
            font-family: sans-serif;
        }
        .gallery {
            display: flex;
            flex-direction: column; /* one per line */
            align-items: center;    /* center each image */
        }
        .gallery img {
            max-width: 90%;  /* larger images */
            height: auto;
            margin: 20px 0;  /* space between images */
            border: 1px solid #ccc;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="gallery">
        <?php
        if ($images) {
            foreach ($images as $img_path) {
                $filename = basename($img_path);
                $img_url = $photo_url_base . '/' . $filename;
                echo "<img src='$img_url' alt=''>";
            }
        } else {
            echo "<p>No images found in this folder.</p>";
        }
        ?>
    </div>
</body>
</html>