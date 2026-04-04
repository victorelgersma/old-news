<?php
$links = [
    "Home" => "/",
    "Link to original" => "https://www.britishnewspaperarchive.co.uk/viewer/BL/0002115/18451220/035/0010?browse=true&fullscreen=true",
    "View photos" => "./photos"
];
$headerPartial = __DIR__ . '/../../../../partials/newspaper-header.php';
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