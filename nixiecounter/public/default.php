<?php
header('Content-Type: image/png');

require_once __DIR__ . '/../src/NixieRenderer.php';

// Create a default counter showing zeros
$renderer = new NixieRenderer();
$image = $renderer->renderCounter(0);

// Output the image
imagepng($image);
imagedestroy($image); 