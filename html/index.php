<?php
// homepage.php

$newspapers = [
  [
    "title" => "Mercury, 1844 'Review of Review of Vestiges'",
    "url" => "1844/mercury/"
  ],
  // Add more newspapers here:
  // [
  //     "title" => "Another Newspaper Title",
  //     "url" => "path/to/newspaper/"
  // ],
];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Old News</title>
  <link rel="stylesheet" type="text/css" href="style/tufte.min.css">
</head>

<body>
  <h1>Old News</h1>
  <article>
    <section>
      <p>Welcome to Old News. The goal of this website is to resurrect some old newspapers from the crusty confines of
        digital photocopies and make them readable and enjoyable for us 21st century critters.</p>

    </section>
  </article>

  <ul>
    <?php foreach ($newspapers as $paper): ?>
      <li>
        <p><a href="<?php echo htmlspecialchars($paper['url']); ?>"><?php echo htmlspecialchars($paper['title']); ?></a>
        </p>
      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>