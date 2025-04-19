const fs = require('fs');
const path = require('path');

const DATA_FILE = path.join(__dirname, 'data', 'counters.json');

// Make sure the data directory exists
function ensureDataDirectory() {
  const dataDir = path.dirname(DATA_FILE);
  if (!fs.existsSync(dataDir)) {
    fs.mkdirSync(dataDir, { recursive: true });
  }
}

// Load counters from JSON file
function loadCounters() {
  ensureDataDirectory();
  
  try {
    if (fs.existsSync(DATA_FILE)) {
      const data = fs.readFileSync(DATA_FILE, 'utf8');
      return JSON.parse(data);
    }
  } catch (error) {
    console.error('Error loading counter data:', error);
  }
  
  return {}; // Return empty object if file doesn't exist or there's an error
}

// Save counters to JSON file
function saveCounters(counters) {
  ensureDataDirectory();
  
  try {
    fs.writeFileSync(DATA_FILE, JSON.stringify(counters, null, 2), 'utf8');
  } catch (error) {
    console.error('Error saving counter data:', error);
  }
}

// Increment counter for a username and save to file
function incrementCounter(username) {
  const counters = loadCounters();
  
  if (!counters[username]) {
    counters[username] = 0;
  }
  
  counters[username]++;
  saveCounters(counters);
  
  return counters[username];
}

// Get counter value for a username
function getCounter(username) {
  const counters = loadCounters();
  return counters[username] || 0;
}

module.exports = {
  loadCounters,
  saveCounters,
  incrementCounter,
  getCounter
}; 