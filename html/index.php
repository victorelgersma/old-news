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

// --- Add this Route near your other routes in index.php ---
if (strpos($clean_uri, 'pub/') === 0) {
    $pub_key = str_replace('pub/', '', $clean_uri);
    render_publication_page($pub_key);
    exit;
}

// 3. Article Route
$target_file = $articles_base . '/' . $clean_uri;

// Check if we have metadata for this URI
if (isset($metadata[$clean_uri])) {
    if (file_exists($target_file) && is_file($target_file)) {
        // Normal Case: Transcription exists
        render_article($clean_uri, $target_file);
    } else {
        // Case: Metadata exists, but no transcription file yet
        render_pending_transcription($clean_uri);
    }
    exit;
}

// Fallback: If no metadata exists at all, it's a real 404
http_response_code(404);
render_404();


// ------------------------

function render_article($uri, $full_path) {
    global $metadata, $publications;

    $meta = $metadata[$uri] ?? ['title' => basename($uri, '.html')];
    $parts = explode('/', $uri);

    // Variables for layout.php
    $title = $meta['title'] ?? basename($uri, '.html');

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

// --- Update render_home() to include pub_key ---
function render_home() {
    global $site_name, $metadata, $publications;

    $links = [];
    foreach ($metadata as $uri => $meta) {
        $parts = explode('/', $uri);
        $pub_key = $parts[0];

        $links[] = [
            'uri'     => $uri,
            'pub_key' => $pub_key, // Add this line
            'title'   => $meta['title'],
            'pub'     => $publications[$pub_key] ?? ucfirst(str_replace('_', ' ', $pub_key)),
            'date'    => ($parts[2] ?? '') . '/' . ($parts[1] ?? '')
        ];
    }
    usort($links, fn($a, $b) => strcmp($b['uri'], $a['uri']));
    include('home.php');
}

// Update this function at the bottom of index.php
function render_404() {
    global $site_name, $publications; // Bring in globals for layout.php

    // Set variables that layout.php expects
    $title = "404 Not Found";
    $pub_name = $site_name; 
    $day_name = "";
    $day_num  = "";
    $date_str = "";
    $photo_link = "/"; // Link back home
    
    // The actual error message
    $content = "
        <p>We are sorry, but the article or page you are looking for doesn't exist in the archive.</p>
        <p>It may have been moved, or our digital humanities pipeline hasn't processed it yet.</p>
    ";

    include('layout.php');
}

function render_pending_transcription($uri) {
    global $metadata, $publications;

    $meta = $metadata[$uri] ?? ['title' => 'Pending Article'];
    $parts = explode('/', $uri);

    $title = $meta['title'];
    $pub_key = $parts[0];
    $pub_name = $publications[$pub_key] ?? ucfirst(str_replace('_', ' ', $pub_key));
    $day_name = $meta['day_name'] ?? '';
    $day_num  = $meta['day_num'] ?? '';
    $date_str = ($parts[2] ?? '') . '/' . ($parts[1] ?? '');
    
    // Photocopy link remains the same
    $photo_link = "/photocopy/" . $uri;

    $content = "
        <div style='background: #fff4e6; border: 1px solid #ffd8a8; padding: 1.5rem; border-radius: 4px; color: #d9480f;'>
            <h3 style='margin-top:0;'>Transcription Pending</h3>
            <p>The text for this article hasn't been performed yet as part of our digital humanities pipeline.</p>
            <p>However, you can view the original newspaper clipping by clicking <strong>'View Source'</strong> above.</p>
        </div>
    ";

    include('layout.php');
}

function render_publication_page($pub_key) {
    global $site_name, $metadata, $publications;

    $pub_name = $publications[$pub_key] ?? ucfirst(str_replace('_', ' ', $pub_key));
    $description = "Archive of articles from " . $pub_name;

    $links = [];
    foreach ($metadata as $uri => $meta) {
        if (strpos($uri, $pub_key . '/') === 0) {
            $parts = explode('/', $uri);
            $links[] = [
                'uri'   => $uri,
                'title' => $meta['title'],
                'date'  => ($parts[2] ?? '') . '/' . ($parts[1] ?? '')
            ];
        }
    }
    include('pub.php');
}