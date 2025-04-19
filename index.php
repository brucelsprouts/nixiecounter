<?php
// Nixie Tube GitHub Profile Views Counter

// Set headers for image response
header('Content-Type: image/svg+xml');
header('Cache-Control: max-age=0, no-cache, no-store, must-revalidate');

// Get username from query parameter
$username = isset($_GET['username']) ? trim($_GET['username']) : '';

if (empty($username)) {
    // Redirect to GitHub repo if no username provided
    header('Location: https://github.com/yourusername/nixie-counter');
    exit;
}

// Storage directory for counter data
$storageDir = __DIR__ . '/storage';
if (!file_exists($storageDir)) {
    mkdir($storageDir, 0755, true);
}

// File to store the count for this username
$countFile = $storageDir . '/' . preg_replace('/[^a-zA-Z0-9_-]/', '', $username) . '.txt';

// Get current count
$count = 0;
if (file_exists($countFile)) {
    $count = (int) file_get_contents($countFile);
}

// Check if request is from GitHub Camo
$isGitHubUserAgent = strpos($_SERVER['HTTP_USER_AGENT'] ?? '', 'github-camo') === 0;

// Increment count if it's a GitHub request
if ($isGitHubUserAgent) {
    $count++;
    file_put_contents($countFile, $count);
}

// Get base count from query parameter (for migration from other counters)
$baseCount = isset($_GET['base']) ? (int) $_GET['base'] : 0;
$count += $baseCount;

// Convert count to string and pad with zeros if needed
$countStr = (string) $count;
$minDigits = isset($_GET['min_digits']) ? (int) $_GET['min_digits'] : 5;
$countStr = str_pad($countStr, $minDigits, '0', STR_PAD_LEFT);

// Generate SVG with Nixie tube images
$svgWidth = strlen($countStr) * 60; // Each digit is approximately 60px wide
$svgHeight = 120; // Height of the Nixie tube images

// Start SVG
$svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<svg width="' . $svgWidth . '" height="' . $svgHeight . '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <style>
    .nixie-digit { filter: drop-shadow(0 0 5px rgba(255, 140, 0, 0.7)); }
  </style>
  <rect width="100%" height="100%" fill="#000000" rx="10" ry="10" />
';

// Add each digit
$digitWidth = 60;
for ($i = 0; $i < strlen($countStr); $i++) {
    $digit = $countStr[$i];
    $x = $i * $digitWidth;
    
    $svg .= '  <image x="' . $x . '" y="10" width="' . $digitWidth . '" height="100" xlink:href="nixie%20numbers/' . $digit . '.png" class="nixie-digit" />
';
}

// Close SVG
$svg .= '</svg>';

// Output the SVG
echo $svg;