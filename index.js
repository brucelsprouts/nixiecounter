const express = require('express');
const fs = require('fs');
const path = require('path');
const app = express();
const PORT = process.env.PORT || 3000;

// In-memory storage for visitor counts (in a real app, you'd use a database)
const counters = {};

// Path to nixie number images
const NIXIE_PATH = path.join(__dirname, 'nixie numbers');

// Function to read the nixie tube images as base64
const nixieDigits = {};
function loadNixieDigits() {
  for (let i = 0; i <= 9; i++) {
    const imagePath = path.join(NIXIE_PATH, `${i}.png`);
    const imageBuffer = fs.readFileSync(imagePath);
    nixieDigits[i] = `data:image/png;base64,${imageBuffer.toString('base64')}`;
  }
}

// Load nixie digits on startup
try {
  loadNixieDigits();
  console.log('Nixie digits loaded successfully');
} catch (error) {
  console.error('Error loading nixie digits:', error);
}

// Generate SVG image with Nixie tubes
function generateCounterSvg(count) {
  // Pad the count with leading zeros to ensure at least 5 digits
  const paddedCount = count.toString().padStart(5, '0');
  const digitWidth = 120; // Width of each nixie tube digit
  const digitHeight = 200; // Height of each nixie tube digit
  const padding = 10; // Padding between digits
  const totalWidth = paddedCount.length * digitWidth + (paddedCount.length - 1) * padding;
  
  // Start SVG content
  let svg = `<svg width="${totalWidth}" height="${digitHeight}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 ${totalWidth} ${digitHeight}" style="background-color: transparent;">`;
  
  // Add each digit
  for (let i = 0; i < paddedCount.length; i++) {
    const digit = parseInt(paddedCount[i], 10);
    const x = i * (digitWidth + padding);
    svg += `<image x="${x}" y="0" width="${digitWidth}" height="${digitHeight}" xlink:href="${nixieDigits[digit]}" />`;
  }
  
  // Close SVG tag
  svg += '</svg>';
  
  return svg;
}

// Route to serve the counter image
app.get('/count/:username', (req, res) => {
  const username = req.params.username.toLowerCase();
  
  // Increment counter for this username
  if (!counters[username]) {
    counters[username] = 0;
  }
  counters[username]++;
  
  // Generate SVG with the current count
  const svg = generateCounterSvg(counters[username]);
  
  // Set appropriate headers and send the SVG
  res.setHeader('Content-Type', 'image/svg+xml');
  res.setHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
  res.send(svg);
});

// Generate a preview SVG with a fixed number (12345)
app.get('/preview', (req, res) => {
  const svg = generateCounterSvg(12345);
  res.setHeader('Content-Type', 'image/svg+xml');
  res.send(svg);
});

// Start the server
app.listen(PORT, () => {
  console.log(`Nixie tube counter server running on port ${PORT}`);
}); 