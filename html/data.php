<?php
// data.php

$site_name = "Old News Archive";
$base_dir = "/var/www/vjbe.net/html"; 
$articles_base = $base_dir . "/oldnews-articles-only";
$photos_base = "https://oldnews.vjbe.net/oldnews-photos";

$publications = [
    'liverpool_mercury' => 'Liverpool Mercury',
    'manchester_guardian' => 'The Manchester Guardian',
];

$metadata = [
    'liverpool_mercury/1845/10/readership.html' => [
        'title' => 'MERCURY EXTRAORDINARY!',
        'day_num' => '03',
        'day_name' => 'Friday',
        'source_url' => "https://britishnewspaperarchive.co.uk/viewer/bl/0000081/18451017/005/0001"
    ],
    'liverpool_mercury/1845/10/vestiges-sedgwick-review-of-review.html' => [
        'title' => 'THE EDINBURGH REVIEW, AND VESTIGES OF THE NATURAL CREATION',
        'day_num' => '03',
        'day_name' => 'Friday',
        'source_url' => "https://britishnewspaperarchive.co.uk/viewer/bl/0000081/18451017/005/0001"
    ],
];
