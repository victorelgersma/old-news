<?php
$title = "The Vestiges of the Natural History of Creation";
$date = "10 January 1846";
$links = [
    "Home" => "/",
    "Link to original" => "https://www.britishnewspaperarchive.co.uk/viewer/bl/0001177/18460110/033/0003",
    "View photos" => "./photos"
];
$headerPartial = __DIR__ . '/../../../partials/newspaper-header.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="/style/tufte.min.css">
  <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
  <article>
    <?php require $headerPartial; ?>

    <section>
    </section>
  </article>
</body>
</html>