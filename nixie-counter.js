class NixieCounter {
  constructor(options = {}) {
    this.counterEndpoint = options.counterEndpoint || 'https://api.countapi.xyz/hit/';
    this.namespace = options.namespace || window.location.host.replace(/\./g, '-');
    this.key = options.key || 'nixie-counter';
    this.digits = options.digits || 8;
    this.imageBaseUrl = options.imageBaseUrl || 'https://koirand.github.io/nixie-timer/images/';
    this.containerId = options.containerId || 'nixie-counter-container';
    this.container = null;
    this.count = 0;
  }

  async initialize() {
    // Create container if it doesn't exist
    this.container = document.getElementById(this.containerId);
    if (!this.container) {
      this.container = document.createElement('div');
      this.container.id = this.containerId;
      document.body.appendChild(this.container);
    }
    
    // Apply styles to container
    this.container.style.display = 'flex';
    this.container.style.justifyContent = 'center';
    this.container.style.backgroundColor = '#222';
    this.container.style.padding = '10px';
    this.container.style.borderRadius = '5px';
    this.container.style.boxShadow = '0 0 10px rgba(255, 120, 0, 0.5)';
    
    // Create digit elements
    for (let i = 0; i < this.digits; i++) {
      const digitElement = document.createElement('img');
      digitElement.id = `nixie-digit-${i}`;
      digitElement.src = `${this.imageBaseUrl}0.png`;
      digitElement.style.height = '50px';
      digitElement.style.margin = '0 2px';
      this.container.appendChild(digitElement);
    }
    
    // Fetch and update count
    await this.updateCount();
  }

  async updateCount() {
    try {
      // Increment counter using CountAPI
      const response = await fetch(`${this.counterEndpoint}${this.namespace}/${this.key}`);
      const data = await response.json();
      
      if (data && data.value) {
        this.count = data.value;
        this.updateDigits();
      }
    } catch (error) {
      console.error('Error updating Nixie counter:', error);
    }
  }

  updateDigits() {
    // Convert count to string and pad with leading zeros
    const countStr = this.count.toString().padStart(this.digits, '0');
    
    // Update each digit image
    for (let i = 0; i < this.digits; i++) {
      const digit = countStr[i] || '0';
      const digitElement = document.getElementById(`nixie-digit-${i}`);
      if (digitElement) {
        digitElement.src = `${this.imageBaseUrl}${digit}.png`;
      }
    }
  }

  // Helper method to create script tag for embedding
  static generateEmbedCode(options = {}) {
    const defaultOptions = {
      namespace: 'your-github-username',
      key: 'your-repo-name',
      digits: 8
    };
    
    const mergedOptions = {...defaultOptions, ...options};
    
    return `<!-- Nixie Counter -->
<div id="nixie-counter-container"></div>
<script src="https://cdn.jsdelivr.net/gh/YOUR_USERNAME/nixiecreadme@main/nixie-counter.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', async () => {
    const counter = new NixieCounter({
      namespace: '${mergedOptions.namespace}',
      key: '${mergedOptions.key}',
      digits: ${mergedOptions.digits}
    });
    await counter.initialize();
  });
</script>`;
  }
}

// Make available in browser and module contexts
if (typeof window !== 'undefined') {
  window.NixieCounter = NixieCounter;
}
if (typeof module !== 'undefined' && module.exports) {
  module.exports = NixieCounter;
} 