<?php
// This partial assumes these variables are set in the parent PHP file:
// $title, $price, $date, $links (associative array: label => URL)
?>

<section class="newspaper-header">
  <ul style="list-style-type:none; padding-left:0;">
    <?php foreach ($links as $label => $url): ?>
      <li style="display:inline; margin-right:1em;">
        <a href="<?php echo htmlspecialchars($url); ?>" <?php if (strpos($url, 'http') === 0) echo 'target="_blank"'; ?>>
          <?php echo htmlspecialchars($label); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <header style="margin-top:1em; margin-bottom:0.5em;">
    <h1 style="font-size:1.5em; margin:0;"><?php echo htmlspecialchars($title); ?></h1>
    <p class="meta" style="font-size:0.9em; color:#555; margin:0.2em 0;">
      <span class="price"><?php echo htmlspecialchars($price); ?></span> |
      <span class="date"><?php echo htmlspecialchars($date); ?></span>
    </p>
  </header>

  <hr style="margin:1em 0; border:0; border-top:1px solid #ccc;">
</section>
