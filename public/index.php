<?php
header('Content-Type: image/png');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

require_once __DIR__ . '/../src/Counter.php';
require_once __DIR__ . '/../src/NixieRenderer.php';

// Get the username from the query string
$username = $_GET['username'] ?? 'default';

// Process additional parameters
$minDigits = isset($_GET['digits']) ? (int)$_GET['digits'] : 6; // Default to 6 digits
$base = isset($_GET['base']) ? (int)$_GET['base'] : 0; // Default base value is 0

// Initialize counter
$counter = new Counter($username);

// Increment the view count
$count = $counter->increment() + $base;

// Create the nixie tube counter image
$renderer = new NixieRenderer();
$image = $renderer->renderCounter($count, $minDigits);

// Output the image
imagepng($image);
imagedestroy($image); 