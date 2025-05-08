 # Nixie Counter Documentation

## Overview
The Nixie Counter is a retro-style visitor counter that displays real-time statistics using a Nixie tube aesthetic. It is designed to be embedded in GitHub profile READMEs or any web page, fetching and displaying the latest data from your server.

---

## How to Use

### For GitHub Profile or Web Page

1. **Add the following line to your README.md or HTML:**
   ```markdown
   ![Nixie Counter](http://192.18.158.188:8080/simple.php?username=YOUR_GITHUB_USERNAME)
   ```
   - Replace `YOUR_GITHUB_USERNAME` with your actual GitHub username.
   - Note that due to GitHub's heavy image caching, profile counter may be inaccurate. To see real-time viewer counts, please visit:
   ```
   http://192.18.158.188:8080/simple.php?username=YOUR_GITHUB_USERNAME
   ```
   - 192.18.158.188 is the ip address for my Orcale server, in the future nixie.brucelsprouts.com should become usable, still waiting on the DNS to go through.
   

2. **The counter will automatically increment and display the current count each time your profile or page is loaded.**
3. **No user interaction is required.**

---

## Technical Details

- **Current server IP:** `192.18.158.188`
- **Planned domain:** `nixie.brucelsprouts.com` (pending DNS setup)
- **Image-based rendering:** The counter is served as a single PNG image, generated dynamically by PHP.
- **Update frequency:** The counter updates in real time on direct access, but may be cached for several minutes or hours when embedded in GitHub READMEs due to GitHub's image caching.
- **Customization:**  
  - `digits`: Minimum number of digits to display (default: 6)  
    Example: `...?username=YOURNAME&digits=8`
  - `base`: Starting count value (default: 0)  
    Example: `...?username=YOURNAME&base=1000`

---

## Notes

- **GitHub Caching:**  
  The counter may not update instantly on your GitHub profile due to GitHub's image caching. For real-time updates, visit the direct image URL in your browser.
- **Refresh:**  
  If the counter appears stalled, refresh the page or wait for the cache to expire.
- **Self-Hosting:**  
  To host your own counter, see the INSTALLATION.md and README.md for setup instructions.

---

## Example

```markdown
![Nixie Counter](http://192.18.158.188:8080/simple.php?username=brucelsprouts)
```
or (once DNS is set up):
```markdown
![Nixie Counter](https://nixie.brucelsprouts.com/simple.php?username=brucelsprouts)
```

---

## Support

For questions, issues, or contributions, please open an issue or pull request on the [GitHub repository](https://github.com/brucelsprouts/nixiecreadme).
