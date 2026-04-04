<?php
// photocopy.php
require_once('data.php');

$uri = $_GET['uri'] ?? '';
// Strip .html to get the folder path (e.g., liverpool_mercury/1845/10/readership)
$folder_name = str_replace('.html', '', $uri);

$meta = $metadata[$uri] ?? [];
$source_url = $meta['source_url'] ?? null;

// DISK PATH: This is where PHP looks for filenames
$local_photo_path = "/var/www/vjbe.net/html/oldnews-photos/" . $folder_name;

// URL PATH: This is what the browser uses to load the image
// If your subdomain points to the 'oldnews-photos' folder, 
// we don't include 'oldnews-photos' in the URL string.
$photos_url_base = "https://oldnews-photos.vjbe.net";

$images = [];
if (is_dir($local_photo_path)) {
    $files = scandir($local_photo_path);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && preg_match('/\.(png|jpg|jpeg)$/i', $file)) {
            // URL will look like: https://oldnews-photos.vjbe.net/liverpool_mercury/1845/10/readership/Screenshot...png
            $images[] = rtrim($photos_url_base, '/') . '/' . $folder_name . '/' . $file;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Photocopy Viewer | <?= htmlspecialchars($folder_name) ?></title>
    <link rel="stylesheet" href="https://oldnews.vjbe.net/style/tufte.min.css">
    <style>
        body {
            padding: 2rem;
            text-align: center;
            background-color: #151515;
            color: #eee;
        }

        .controls {
            margin-bottom: 2rem;
            text-align: left;
        }

        img {
            display: block;
            margin: 2rem auto;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.9);
            border: 1px solid #333;
        }

        a {
            color: #8cf;
            text-decoration: none;
            border-bottom: 1px solid #8cf;
        }

        .error-msg {
            margin-top: 5rem;
            color: #777;
        }

        code {
            color: #ff6b6b;
            background: #222;
            padding: 2px 5px;
        }
    </style>
</head>

<body>
    <div class="controls">
        <a href="/<?= htmlspecialchars($uri) ?>">← Back to Article</a>
        <?php if ($source_url): ?>
            | <a href="<?= htmlspecialchars($source_url) ?>" target="_blank" class="source-link">British Newspaper Archive
                ↗</a>
        <?php endif; ?>
    </div>

    <?php if (empty($images)): ?>
        <div class="error-msg">
            <p>No photocopies found.</p>
            <p style="font-size: 0.8rem;">Checked Disk Path: <code><?= htmlspecialchars($local_photo_path) ?></code></p>
        </div>
    <?php else: ?>
        <?php foreach ($images as $img): ?>
            <img src="<?= htmlspecialchars($img) ?>" alt="Original Newspaper Clipping">
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>