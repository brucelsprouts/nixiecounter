# Nixie Tube Visitor Counter for GitHub README

A stylish, self-contained visitor counter that displays your GitHub README view count using retro Nixie tube aesthetics.

<div align="center">
  <div id="nixie-counter-container"></div>
</div>

<!-- Nixie Counter Script - Live Implementation -->
<script src="nixie-counter.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', async () => {
    const counter = new NixieCounter({
      namespace: 'nixiecreadme-demo',
      key: 'live-demo',
      digits: 8
    });
    await counter.initialize();
  });
</script>

<div align="center">
  <i>This counter above is a live implementation of the Nixie Tube Counter!</i>
</div>

## Features

- 📊 Displays visitor count using retro Nixie tube aesthetic
- 🔄 Increments count with each page visit
- 🔧 Customizable number of digits (default: 8)
- 📈 Uses CountAPI for reliable counting
- 🔌 Works with any GitHub README or web page
- 🛠️ Easy to implement with minimal code

## Quick Start

Add this code to your GitHub README:

```html
<!-- Nixie Counter -->
<div id="nixie-counter-container"></div>
<script src="https://cdn.jsdelivr.net/gh/YOUR_USERNAME/nixiecreadme@main/nixie-counter.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', async () => {
    const counter = new NixieCounter({
      namespace: 'your-github-username',
      key: 'your-repo-name',
      digits: 8
    });
    await counter.initialize();
  });
</script>
```

> **Note:** GitHub README rendering doesn't support external scripts, so to see a live demo, visit the [demo page](https://github.com/YOUR_USERNAME/nixiecreadme/blob/main/demo.html). The counter functionality works on any web page where JavaScript is allowed.

Replace:
- `YOUR_USERNAME` with your GitHub username in the script source
- `your-github-username` with your GitHub username
- `your-repo-name` with your repository name

## Customization Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `namespace` | String | `window.location.host` | Unique namespace for the counter (recommended: your GitHub username) |
| `key` | String | `"nixie-counter"` | Unique key for the counter (recommended: your repo name) |
| `digits` | Number | `8` | Number of Nixie tubes to display |
| `imageBaseUrl` | String | `"https://koirand.github.io/nixie-timer/images/"` | Base URL for Nixie tube images |
| `containerId` | String | `"nixie-counter-container"` | ID of the container element |
| `counterEndpoint` | String | `"https://api.countapi.xyz/hit/"` | CountAPI endpoint |

## Demo

Visit the [live demo page](https://github.com/YOUR_USERNAME/nixiecreadme/blob/main/demo.html) to see the counter in action and generate customized code for your README.

## How It Works

1. The counter uses [CountAPI](https://countapi.xyz) to track and increment view counts
2. Each page visit triggers a hit to the CountAPI with your unique namespace and key
3. The counter displays the current count using Nixie tube images
4. The images are sourced from [koirand's Nixie Timer project](https://koirand.github.io/nixie-timer/)

## Advanced Usage

### Custom Styling

You can style the counter container using CSS:

```html
<style>
  #nixie-counter-container {
    background-color: #333;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(255, 150, 0, 0.7);
  }
</style>
```

### Custom Implementation

You can also use the NixieCounter class directly in your JavaScript code:

```javascript
const counter = new NixieCounter({
  namespace: 'my-custom-namespace',
  key: 'my-custom-key',
  digits: 6,
  imageBaseUrl: 'https://example.com/nixie-images/'
});
await counter.initialize();
```

## Credits

- Nixie tube images provided by [koirand/nixie-timer](https://github.com/koirand/nixie-timer)
- Counter API powered by [CountAPI](https://countapi.xyz)

## License

MIT License - See LICENSE file for details

---

<div align="center">
  <p>Made with ❤️ by <a href="https://github.com/YOUR_USERNAME">YOUR_USERNAME</a></p>
</div>
