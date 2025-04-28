<?php

class NixieRenderer
{
    private string $imagesDir;
    private array $digitImages = [];
    private int $digitWidth = 0;
    private int $digitHeight = 0;
    private int $margin = 5; // Space between digits
    
    public function __construct()
    {
        $this->imagesDir = __DIR__ . '/../images';
        $this->loadDigitImages();
    }
    
    private function loadDigitImages(): void
    {
        // Load all digit images (0-9)
        for ($i = 0; $i <= 9; $i++) {
            $path = $this->imagesDir . "/$i.png";
            if (file_exists($path)) {
                $this->digitImages[$i] = imagecreatefrompng($path);
                
                // Get dimensions from first image
                if ($i === 0) {
                    $this->digitWidth = imagesx($this->digitImages[$i]);
                    $this->digitHeight = imagesy($this->digitImages[$i]);
                }
            }
        }
    }
    
    public function renderCounter(int $count, int $minDigits = 1): \GdImage
    {
        // Convert count to string and pad with zeros if needed
        $countStr = str_pad((string) $count, $minDigits, '0', STR_PAD_LEFT);
        
        // Calculate the width of the final image based on number of digits
        $totalDigits = strlen($countStr);
        $totalWidth = ($this->digitWidth * $totalDigits) + ($this->margin * ($totalDigits - 1));
        
        // Create the base image with transparent background
        $image = imagecreatetruecolor($totalWidth, $this->digitHeight);
        imagesavealpha($image, true);
        $transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
        imagefill($image, 0, 0, $transparent);
        
        // Add each digit to the image
        for ($i = 0; $i < $totalDigits; $i++) {
            $digit = (int) $countStr[$i];
            $x = $i * ($this->digitWidth + $this->margin);
            
            // If we have an image for this digit, add it to the counter image
            if (isset($this->digitImages[$digit])) {
                imagecopy(
                    $image,
                    $this->digitImages[$digit],
                    $x,
                    0,
                    0,
                    0,
                    $this->digitWidth,
                    $this->digitHeight
                );
            }
        }
        
        return $image;
    }
    
    public function __destruct()
    {
        // Clean up resources
        foreach ($this->digitImages as $image) {
            imagedestroy($image);
        }
    }
} 