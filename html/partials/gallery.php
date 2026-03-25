<?php
// Expect: $images (array of file paths)
// Expect: $photo_url_base (string)

if (!isset($images) || !isset($photo_url_base)) {
    echo "<p>Gallery data not provided.</p>";
    return;
}
?>

<style>
    .gallery {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .gallery img {
        width: 90%;
        max-width: 1000px;
        height: auto;
        margin: 20px 0;
        border: 1px solid #ccc;
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="gallery">
    <?php if ($images): ?>
        <?php foreach ($images as $img_path): ?>
            <?php
                $filename = basename($img_path);
                $img_url = $photo_url_base . '/' . $filename;
            ?>
            <img src="<?= htmlspecialchars($img_url) ?>" alt="">
        <?php endforeach; ?>
    <?php else: ?>
        <p>No images found in this folder.</p>
    <?php endif; ?>
</div>
