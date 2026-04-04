<?php
// index.php
require_once('data.php');

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$clean_uri = ltrim(preg_replace('/^\/oldnews\//', '', $request_uri), '/');

if ($clean_uri == "" || $clean_uri == "index.php") {
    render_home();
    exit;
}

$target_file = $articles_base . '/' . $clean_uri;

if (file_exists($target_file) && is_file($target_file)) {
    render_article($clean_uri, $target_file);
} else {
    header("HTTP/1.0 404 Not Found");
    render_404();
}

function render_article($uri, $full_path) {
    global $metadata, $publications, $photos_base;

    $meta = $metadata[$uri] ?? ['title' => basename($uri, '.html')];
    $parts = explode('/', $uri);
    
    // Variables for layout.php
    $title = $meta['title'];
    $pub_key = $parts[0];
    $pub_name = $publications[$pub_key] ?? ucfirst(str_replace('_', ' ', $pub_key));
    $day_name = $meta['day_name'] ?? '';
    $day_num  = $meta['day_num'] ?? '';
    $date_str = ($parts[2] ?? '') . '/' . ($parts[1] ?? '');
    $source_url = $meta['source_url'] ?? null;
    $photo_link = $photos_base . '/' . str_replace('.html', '.png', $uri);
    
    $content = file_get_contents($full_path);
    include('layout.php');
}

function render_home() {
    global $site_name;
    echo "<h1>$site_name</h1><p>Welcome. Publication list coming soon.</p>";
}

function render_404() {
    echo "<h1>404 Not Found</h1><p>Article not found.</p>";
}