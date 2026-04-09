<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pub_name) ?> | <?= htmlspecialchars($site_name) ?></title>
    <link rel="stylesheet" href="https://oldnews.vjbe.net/style/tufte.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <article>
        <header>
            <nav><a href="/">← Back to Archive</a></nav>
            <h1><?= htmlspecialchars($pub_name) ?></h1>
            <p class="subtitle"><?= htmlspecialchars($description) ?></p>
        </header>

        <section>
            <h2>Articles in this Publication</h2>
            <ul style="list-style-type: none; padding: 0;">
                <?php foreach ($links as $link): ?>
                    <li style="margin-bottom: 1.2rem;">
                        <a href="/<?= htmlspecialchars($link['uri']) ?>">
                            <strong><?= htmlspecialchars($link['title']) ?></strong>
                        </a>
                        <span style="color: #888; font-size: 0.9rem;"> — <?= $link['date'] ?></span>
                    </li>
                <?php endforeach; ?>
                <?php if (empty($links)): ?>
                    <p>No articles transcribed yet for this publication.</p>
                <?php endif; ?>
            </ul>
        </section>

        <footer>
            <hr>
            <p>Part of the <?= htmlspecialchars($site_name) ?>.</p>
        </footer>
    </article>
</body>
</html>
