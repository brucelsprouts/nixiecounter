# Nixie Tube Visitor Counter

A retro-style visitor counter for your GitHub profile that displays views using vintage Nixie tube digits.

## Preview

![Nixie Tube Visitor Counter](https://github.com/username/nixiecreadme/blob/main/preview.svg)

## How to Use

Add this to your GitHub profile README.md:

```markdown
![Nixie Tube Visitor Counter](https://nixiecounter.herokuapp.com/count/username)
```

Replace `username` with your actual GitHub username.

## Features

- Unique vintage Nixie tube display aesthetic
- Automatically updates with each profile view
- Customizable display options

## How It Works

This counter uses the classic Nixie tube number display - a vintage display technology from the 1960s that uses glowing digit-shaped tubes to show numbers. Each time someone views your profile, the counter increments, displaying the total view count with these beautiful glowing digits.

## Implementation Notes

The counter is implemented as a simple web service that:
1. Tracks the number of views for each GitHub username
2. Generates an SVG image with the appropriate Nixie tube digits
3. Returns the image to be displayed in your README

## Local Development

For local development and testing:

1. Clone this repository
2. Install dependencies with `npm install`
3. Run the local server with `npm start`
4. Test the counter at `http://localhost:3000/count/test`

## License

MIT License - Feel free to use and modify for your own projects.

## Acknowledgements

- Inspired by other GitHub profile counters
- Nixie tube number images used with permission 