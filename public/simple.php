<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get the username from the URL path instead of query string
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', trim($path, '/'));
$username = $pathParts[0] ?? 'default';

// Process additional parameters
$minDigits = isset($_GET['digits']) ? (int)$_GET['digits'] : 6; // Default to 6 digits
$base = isset($_GET['base']) ? (int)$_GET['base'] : 0; // Default base value is 0

// Create a safe username for file storage
$safeUsername = preg_replace('/[^a-zA-Z0-9_-]/', '', $username);
$counterFile = __DIR__ . '/../storage/' . $safeUsername . '.txt';

// Ensure storage directory exists
$storageDir = __DIR__ . '/../storage';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0777, true);
}

// Get current count
$count = 0;
if (file_exists($counterFile)) {
    $count = (int) file_get_contents($counterFile);
}

// Increment count
$count++;

// Save the new count
file_put_contents($counterFile, $count);

// Add base value
$count += $base;

// Format count with leading zeros
$countStr = str_pad((string) $count, $minDigits, '0', STR_PAD_LEFT);

// Path to digit images
define('DIGIT_PATH', __DIR__ . '/images/');

// Load the first digit to get width/height
$firstDigit = $countStr[0];
$firstImgPath = DIGIT_PATH . $firstDigit . '.png';
if (!file_exists($firstImgPath)) {
    // Fallback: create a blank image if digit image is missing
    $digitWidth = 40;
    $digitHeight = 80;
    $firstImg = imagecreatetruecolor($digitWidth, $digitHeight);
    $transparent = imagecolorallocatealpha($firstImg, 0, 0, 0, 127);
    imagefill($firstImg, 0, 0, $transparent);
    imagesavealpha($firstImg, true);
} else {
    $firstImg = imagecreatefrompng($firstImgPath);
    $digitWidth = imagesx($firstImg);
    $digitHeight = imagesy($firstImg);
}

// Create the final image
$finalImg = imagecreatetruecolor($digitWidth * strlen($countStr), $digitHeight);
imagesavealpha($finalImg, true);
$trans_colour = imagecolorallocatealpha($finalImg, 0, 0, 0, 127);
imagefill($finalImg, 0, 0, $trans_colour);

// Copy each digit image onto the final image
for ($i = 0; $i < strlen($countStr); $i++) {
    $digit = $countStr[$i];
    $imgPath = DIGIT_PATH . $digit . '.png';
    if (file_exists($imgPath)) {
        $digitImg = imagecreatefrompng($imgPath);
    } else {
        // Fallback: blank image if missing
        $digitImg = imagecreatetruecolor($digitWidth, $digitHeight);
        $transparent = imagecolorallocatealpha($digitImg, 0, 0, 0, 127);
        imagefill($digitImg, 0, 0, $transparent);
        imagesavealpha($digitImg, true);
    }
    imagecopy($finalImg, $digitImg, $i * $digitWidth, 0, 0, 0, $digitWidth, $digitHeight);
    imagedestroy($digitImg);
}

// Output the final image
$timestamp = time();
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $timestamp) . ' GMT');
header('ETag: "' . md5($countStr . $timestamp) . '"');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
header('Content-Type: image/png');
imagepng($finalImg);
imagedestroy($finalImg);
if (isset($firstImg)) {
    imagedestroy($firstImg);
}
// No HTML output 