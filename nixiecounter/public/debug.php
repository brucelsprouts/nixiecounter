<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Nixie Counter Debug</h1>";

// Check GD extension
if (extension_loaded('gd')) {
    echo "<p style='color:green'>✓ GD extension is installed</p>";
} else {
    echo "<p style='color:red'>✗ GD extension is NOT installed</p>";
}

// Check image directory
$imagesDir = __DIR__ . '/../images';
echo "<p>Images directory: {$imagesDir}</p>";

if (is_dir($imagesDir)) {
    echo "<p style='color:green'>✓ Images directory exists</p>";
} else {
    echo "<p style='color:red'>✗ Images directory does NOT exist</p>";
}

// List image files
echo "<h2>Image Files:</h2>";
echo "<ul>";
for ($i = 0; $i <= 9; $i++) {
    $path = $imagesDir . "/$i.png";
    if (file_exists($path)) {
        echo "<li style='color:green'>✓ $i.png exists</li>";
        
        // Try loading the image
        $img = @imagecreatefrompng($path);
        if ($img) {
            echo " - Successfully loaded image";
            imagedestroy($img);
        } else {
            echo " - <span style='color:red'>Failed to load image</span>";
        }
    } else {
        echo "<li style='color:red'>✗ $i.png does NOT exist</li>";
    }
}
echo "</ul>";

// Check storage directory
$storageDir = __DIR__ . '/../storage';
echo "<p>Storage directory: {$storageDir}</p>";

if (is_dir($storageDir)) {
    echo "<p style='color:green'>✓ Storage directory exists</p>";
    
    // Check if writable
    if (is_writable($storageDir)) {
        echo "<p style='color:green'>✓ Storage directory is writable</p>";
    } else {
        echo "<p style='color:red'>✗ Storage directory is NOT writable</p>";
    }
} else {
    echo "<p style='color:red'>✗ Storage directory does NOT exist</p>";
}
?> 