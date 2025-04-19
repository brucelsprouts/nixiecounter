const fs = require('fs');
const path = require('path');

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

// Test function
async function test() {
  try {
    // Load nixie digits
    loadNixieDigits();
    console.log('Nixie digits loaded successfully');
    
    // Generate example SVG with count 12345
    const svg = generateCounterSvg(12345);
    
    // Write SVG to file
    fs.writeFileSync(path.join(__dirname, 'example.svg'), svg);
    console.log('Example SVG generated successfully at example.svg');
  } catch (error) {
    console.error('Error generating example SVG:', error);
  }
}

// Run the test
test(); 