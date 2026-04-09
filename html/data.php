<?php
// data.php

$site_name = "Old News Archive";
$base_dir = "/var/www/vjbe.net/html"; 
$articles_base = $base_dir . "/oldnews-articles-only";
$photos_base = "https://oldnews-photos.vjbe.net/";

$publications = [
    'liverpool_mercury' => [
        'name' => 'Liverpool Mercury',
        'bio'  => 'A leading Whig-Radical provincial newspaper focusing on commerce, local politics, and the popularization of science.'
    ],
    'manchester_guardian' => [
        'name' => 'The Manchester Guardian',
        'bio'  => 'Representing the industrial North, this paper provided serious reporting on 19th-century social and scientific progress.'
    ],
    'spectator' => [
        'name' => 'The Spectator',
        'bio'  => 'An influential weekly magazine known for intellectual rigor and high-level scientific and literary criticism.'
    ],
    'atlas' => [
        'name' => 'The Atlas',
        'bio'  => 'A comprehensive London weekly renowned for its expansive literary reviews and coverage of Victorian treatises.'
    ],
];

$metadata = [
    'liverpool_mercury/1845/10/readership.html' => [
        'title' => 'Mercury Extraordinary!',
        'day_num' => '03',
        'day_name' => 'Friday',
        'source_url' => "https://britishnewspaperarchive.co.uk/viewer/bl/0000081/18451017/005/0001"
    ],
    'liverpool_mercury/1845/10/vestiges-sedgwick-review-of-review.html' => [
        'title' => 'The Edinburgh Review, and Vestiges of the Natural History of Creation',
        'day_num' => '03',
        'day_name' => 'Friday',
        'source_url' => "https://britishnewspaperarchive.co.uk/viewer/bl/0000081/18451017/005/0001"
    ],
    'spectator/1837/07/nichol-s-architecture-of-the-heavens.html' => [
        'title' => "DR. NICHOL'S ARCHITECTURE OF THE HEAVENS.",
        'summary' => "A review of Dr. Nichol's popularization of Herschel's astronomical discoveries, exploring the 'Architecture' of the Milky Way and the nebular hypothesis.",
        'day_num' => '22',
        'source_url' => "https://archive.spectator.co.uk/article/22nd-july-1837/17/dr-nichols-architecture-of-the-heavens"
    ],
    'atlas/1845/12/explanations-review.html' => [
        'title' => "Review of New Books: Explanations: a Sequel to \"Vestiges of the Natural History of Creation\" By the Author of that Work. Churchill. London, 1845",
        "day_num" => "20",
        "source_url" => "https://www.findmypast.co.uk/image-viewer?issue=BL%2F0002115%2F18451220&page=1&fulfillmentTypeKey=4000&record-id=BL%2F0002115%2F18451220%2F006"
    ]
];
