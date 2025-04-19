// Nixie Tube Profile Counter
document.addEventListener('DOMContentLoaded', function() {
  const username = new URLSearchParams(window.location.search).get('username') || 'github';
  
  // Path to nixie tube images (relative to where this script is hosted)
  const nixieImagesPath = './nixie%20numbers/';
  
  // Get view count from komarev silently
  fetch(`https://komarev.com/ghpvc/?username=${username}&style=flat`)
    .then(response => response.text())
    .then(data => {
      // Extract count using regex
      const match = data.match(/message>(\d+)<\/text>/);
      const count = match ? match[1] : '0';
      
      // Create nixie display
      displayNixieCounter(count);
    })
    .catch(error => {
      console.error('Error fetching view count:', error);
      displayNixieCounter('0'); // Display 0 on error
    });
  
  function displayNixieCounter(count) {
    // Container for the counter
    const container = document.getElementById('nixie-counter');
    container.style.display = 'flex';
    container.style.backgroundColor = '#000000';
    container.style.padding = '20px';
    container.style.borderRadius = '8px';
    
    // Pad the count with leading zeros to 11 digits
    const paddedCount = count.padStart(11, '0');
    
    // Create nixie tube display
    paddedCount.split('').forEach(digit => {
      const img = document.createElement('img');
      img.src = `${nixieImagesPath}${digit}.png`;
      img.style.height = '200px';
      img.alt = digit;
      container.appendChild(img);
    });
    
    // Add hidden tracker image from komarev (to actually count visits)
    const tracker = document.createElement('img');
    tracker.src = `https://komarev.com/ghpvc/?username=${username}`;
    tracker.style.display = 'none';
    document.body.appendChild(tracker);
  }
}); 