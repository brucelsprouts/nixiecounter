// GitHub README Nixie Tube Counter
// This script can be included in a GitHub README.md file to display a Nixie tube counter

// Configuration
const config = {
  username: 'your-github-username', // Replace with your GitHub username
  minDigits: 5,                     // Minimum number of digits to display
  baseCount: 0                      // Base count to add to the counter
};

// Create the counter element
function createNixieCounter() {
  // Container for the counter
  const container = document.createElement('div');
  container.style.display = 'inline-block';
  container.style.backgroundColor = '#000';
  container.style.padding = '10px';
  container.style.borderRadius = '10px';
  container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
  
  // Get the count (in a real implementation, this would fetch from a server)
  // For this demo, we'll use a random number
  let count = Math.floor(Math.random() * 10000) + config.baseCount;
  
  // Convert count to string and pad with zeros
  let countStr = count.toString().padStart(config.minDigits, '0');
  
  // Add each digit
  for (let i = 0; i < countStr.length; i++) {
    const digit = countStr[i];
    const img = document.createElement('img');
    img.src = `https://raw.githubusercontent.com/${config.username}/nixie-counter/main/nixie%20numbers/${digit}.png`;
    img.alt = digit;
    img.style.width = '60px';
    img.style.height = '100px';
    img.style.filter = 'drop-shadow(0 0 5px rgba(255, 140, 0, 0.7))';
    container.appendChild(img);
  }
  
  return container;
}

// Insert the counter into the document
document.addEventListener('DOMContentLoaded', function() {
  const counterContainer = document.getElementById('nixie-counter');
  if (counterContainer) {
    counterContainer.appendChild(createNixieCounter());
  }
});