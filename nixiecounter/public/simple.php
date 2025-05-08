<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get the username from the query string
$username = $_GET['username'] ?? 'default';

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

// Generate HTML
header('Content-Type: text/html');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nixie Tube Counter</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            background-color: transparent;
            overflow: hidden;
        }
        .nixie-counter {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
            line-height: 0;
            gap: 0;
        }
        .nixie-digit {
            height: 150px;
            margin: 0;
            padding: 0;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="nixie-counter">
        <?php foreach (str_split($countStr) as $digit): ?>
            <img class="nixie-digit" src="images/<?php echo $digit; ?>.png" alt="">
        <?php endforeach; ?>
    </div>
</body>
</html> 