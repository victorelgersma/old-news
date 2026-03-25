<?php
// homepage.php

$newspapers = [
  [
    "title" => "The Edinburgh Review and the Vestiges of the Natural History of Creation",
    "year" => 1844,
    "month" => 10,
    "newspaper" => "Liverpool Mercury",
    "url" => "1844/mercury/",
    "link_original",
  ],
  [
    "newspaper" => "Edinburgh Evening Post and Scottish Standard",
    "title" => "Vestiges of the Natural History of Creation",
    "url" => "1846/01/edinburgh",
    "year" => 1846,
    "month" => 01
  ]

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
  <nav><a href="about.php">About</a></nav>

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