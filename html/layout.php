<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?> | <?= htmlspecialchars($pub_name) ?></title>
    <link rel="stylesheet" href="https://oldnews.vjbe.net/style/tufte.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { padding: 2rem; }
        header { margin-bottom: 3rem; }
        .source-link { font-style: italic; font-size: 0.9rem; }
    </style>
</head>
<body>
    <article>
        <header>
            <h1><?= htmlspecialchars($title) ?></h1>
            <p class="subtitle">
                <?= htmlspecialchars($pub_name) ?> — 
                <?= $day_name ?> <?= $day_num ?> <?= $date_str ?>
            </p>
            <nav>
                <a href="/oldnews/">← Back to Archive</a> | 
                <a href="<?= $photo_link ?>" target="_blank">View Photocopy</a>
                <?php if ($source_url): ?>
                    | <a href="<?= htmlspecialchars($source_url) ?>" target="_blank" class="source-link">British Newspaper Archive ↗</a>
                <?php endif; ?>
            </nav>
        </header>

        <section>
            <?= $content ?>
        </section>

        <footer>
            <hr>
            <p>Digital Archive maintained by Victor Elgersma.</p>
        </footer>
    </article>
</body>
</html>
