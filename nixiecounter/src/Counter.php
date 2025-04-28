<?php

class Counter
{
    private string $storageDir;
    private string $username;
    private string $counterFile;

    public function __construct(string $username)
    {
        $this->storageDir = __DIR__ . '/../storage';
        $this->username = $this->sanitizeUsername($username);
        $this->counterFile = $this->storageDir . '/' . $this->username . '.txt';
        
        // Ensure storage directory exists
        if (!is_dir($this->storageDir)) {
            mkdir($this->storageDir, 0777, true);
        }
    }

    public function increment(int $incrementBy = 1): int
    {
        $count = $this->getCount();
        $count += $incrementBy;
        
        // Save the new count
        file_put_contents($this->counterFile, $count);
        
        return $count;
    }

    public function getCount(): int
    {
        if (file_exists($this->counterFile)) {
            return (int) file_get_contents($this->counterFile);
        }
        
        return 0;
    }

    private function sanitizeUsername(string $username): string
    {
        // Remove any characters that aren't alphanumeric, dash, or underscore
        return preg_replace('/[^a-zA-Z0-9_-]/', '', $username);
    }
} 