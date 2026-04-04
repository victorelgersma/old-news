<?php
// index.php
require_once('data.php');

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Strip leading slash
$clean_uri = ltrim($request_uri, '/');

// Basic normalization / safety
$clean_uri = preg_replace('/\.\.+/', '', $clean_uri);

// 1. Home Route
if ($clean_uri === "" || $clean_uri === "index.php") {
    render_home();
    exit;
}

// 2. Photocopy Viewer Route
if (strpos($clean_uri, 'photocopy/') === 0) {
    $uri = str_replace('photocopy/', '', $clean_uri);
    $uri = ltrim($uri, '/');
    $uri = preg_replace('/\.\.+/', '', $uri);

    // Optional strict validation (recommended)
    if (!isset($metadata[$uri])) {
        http_response_code(404);
        render_404();
        exit;
    }

    $_GET['uri'] = $uri;
    include('photocopy.php');
    exit;
}

// 3. Article Route
$target_file = $articles_base . '/' . $clean_uri;

// Optional strict validation
if (!isset($metadata[$clean_uri])) {
    http_response_code(404);
    render_404();
    exit;
}

if (file_exists($target_file) && is_file($target_file)) {
    render_article($clean_uri, $target_file);
} else {
    http_response_code(404);
    render_404();
}

// ------------------------

function render_article($uri, $full_path) {
    global $metadata, $publications;

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

    // Photocopy link
    $photo_link = "/photocopy/" . $uri;

    $content = file_get_contents($full_path);
    include('layout.php');
}

function render_home() {
    global $site_name, $metadata, $publications;

    $links = [];
    foreach ($metadata as $uri => $meta) {
        $parts = explode('/', $uri);
        $pub_key = $parts[0];

        $links[] = [
            'uri'   => $uri,
            'title' => $meta['title'],
            'pub'   => $publications[$pub_key] ?? $pub_key,
            'date'  => ($parts[2] ?? '') . '/' . ($parts[1] ?? '')
        ];
    }

    // Sort newest-ish first (by URI descending)
    usort($links, fn($a, $b) => strcmp($b['uri'], $a['uri']));

    include('home.php');
}

function render_404() {
    echo "<h1>404 Not Found</h1><p>Article not found.</p>";
}