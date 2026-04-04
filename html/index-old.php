<?php
// homepage.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$newspapers = [
  [
    "title" => "The Edinburgh Review and the Vestiges of the Natural History of Creation",
    "year" => 1845,
    "month" => 10,
    "newspaper" => "Liverpool Mercury",
    "url" => "mercury/"
  ],
  [
    "title" => "Mercury Extraordinary",
    "year" => 1845,
    "month" => 10,
    "newspaper" => "Liverpool Mercury",
    "url" => "mercury/readership/photos"
  ],
  [
    "title" => "Review of New Books: Explanations: A Sequel to \"Vestiges of the Natural History of Creation\"",
    "year" => 1845,
    "month" => 12,
    "newspaper" => "Atlas",
    "url" => "atlas/explanations-review"
  ],
  [
    "newspaper" => "Edinburgh Evening Post and Scottish Standard",
    "title" => "Vestiges of the Natural History of Creation",
    "url" => "edinburgh/photos",
    "year" => 1846,
    "month" => 1
  ],
];
// Optional: sort newest first
// Sort: Oldest to Newest
usort($newspapers, function($a, $b) {
    // Compare years first
    $yearComparison = ($a['year'] ?? 0) <=> ($b['year'] ?? 0);
    
    // If years are the same (0), compare months
    if ($yearComparison === 0) {
        return ($a['month'] ?? 0) <=> ($b['month'] ?? 0);
    }
    
    return $yearComparison;
});

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Old News</title>
  <link rel="stylesheet" href="style/tufte.min.css">
  <style>
    ul {
      list-style: none;
      padding: 0;
    }

    li {
      margin-bottom: 1.6em;
    }

    .meta {
      font-size: 0.9em;
      color: #555;
    }
  </style>
</head>

<body>
  <h1>Old News</h1>
  <nav><a href="about.php">About</a> |
    <a href="https://github.com/victorelgersma/old-news">Github</a>
  </nav>
  <section>
    <h2> Archive</h2>
    <ul>
      <?php foreach ($newspapers as $paper): ?>
        <li>
          <p>
            <a href="<?= htmlspecialchars(
              ($paper['year'] ?? '') . '/' . str_pad($paper['month'] ?? '', 2, '0', STR_PAD_LEFT) . '/' . ($paper['url'] ?? '#')
            ) ?>">
              <?= htmlspecialchars($paper['title'] ?? 'Untitled') ?>
            </a><br>
            <span class="meta">
              <?= htmlspecialchars($paper['newspaper'] ?? 'Unknown paper') ?>
              —
              <?= htmlspecialchars($paper['year'] ?? '?') ?>
              <?php if (!empty($paper['month'])): ?>
                (<?= str_pad($paper['month'], 2, '0', STR_PAD_LEFT) ?>)
              <?php endif; ?>
            </span>
          </p>
        </li>
      <?php endforeach; ?>
    </ul>
  </section>
</body>

</html>