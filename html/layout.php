<!DOCTYPE html>
<html lang="en">
<!-- ./html/layout.php -->

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?> | <?= htmlspecialchars($pub_name) ?></title>
    <link rel="stylesheet" href="https://oldnews.vjbe.net/style/tufte.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Add MathJax to support LaTeX in OCR fragments -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <style>
        body {
            padding: 2rem;
        }

        header {
            margin-bottom: 3rem;
        }

        .source-link {
            font-style: italic;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <article>
        <header>
            <p class="subtitle">
                <?= htmlspecialchars($pub_name) ?> —
                <?= $day_name ?> <?= $day_num ?> <?= $date_str ?>
            </p>
            <nav>
                <a href="/">← Back to Archive</a> |
                <a href="<?= $photo_link ?>" target="_blank">View Source</a>
            </nav>
        </header>

        <section>
            <?= $content ?>
        </section>

        <footer class="site-footer">
            <hr>
            <p>
                Digital Archive maintained by Victor Elgersma.
                Have you spotted a mistake?
                <a href="mailto:v.j.b.elgersma@students.uu.nl">
                Please send us an email. 
                </a>.
            </p>
            <p>
                View this project on
                <a href="https://github.com/victorelgersma/old-news" target="_blank" rel="noopener noreferrer">
                    GitHub
                </a>
            </p>
        </footer>
    </article>
</body>

</html>