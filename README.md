# Nixie Tube Visitor Counter

A retro-style visitor counter for your GitHub profile that displays views using vintage Nixie tube digits.

## Preview

![Nixie Tube Visitor Counter](https://github.com/username/nixiecreadme/blob/main/preview.svg)

## How to Use

Add this to your GitHub profile README.md:

```markdown
![Nixie Tube Visitor Counter](https://your-deployed-app.herokuapp.com/count/your-username)
```

Replace `your-username` with your actual GitHub username and `your-deployed-app` with your own deployment URL.

## Features

- Unique vintage Nixie tube display aesthetic
- Automatically updates with each profile view
- Customizable display options

## Deployment

### Deploy to Heroku

1. Create a Heroku account if you don't have one
2. Install [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli)
3. Login to Heroku:
   ```
   heroku login
   ```
4. Create a new Heroku app:
   ```
   heroku create your-app-name
   ```
5. Deploy to Heroku:
   ```
   git push heroku main
   ```

### Deploy to Vercel

1. Create a Vercel account if you don't have one
2. Install Vercel CLI:
   ```
   npm i -g vercel
   ```
3. Deploy to Vercel:
   ```
   vercel
   ```

## How It Works

This counter uses the classic Nixie tube number display - a vintage display technology from the 1960s that uses glowing digit-shaped tubes to show numbers. Each time someone views your profile, the counter increments, displaying the total view count with these beautiful glowing digits.

The counter works by:
1. Storing a count for each unique username
2. Generating an SVG image using the provided Nixie tube digit images
3. Returning the SVG to be displayed in your README

## Local Development

For local development and testing:

1. Clone this repository
2. Install dependencies:
   ```
   npm install
   ```
3. Run the local server:
   ```
   npm start
   ```
4. Test the counter at `http://localhost:3000/count/test`
5. View a preview at `http://localhost:3000/preview`

## Quick Test

To generate a quick example without running the server:

1. Run the test script:
   ```
   node test.js
   ```
2. This will generate an `example.svg` file in the root directory showing how the counter looks with the number "12345"

## Customization

You can modify the code to create your own version with:
- Different digit spacing
- Custom background colors
- Different digit sizes

## Persistence

The default implementation uses a JSON file for persistence. For a production version, you should implement a more robust database solution using:
- MongoDB
- Redis
- PostgreSQL
- Or any other database of your choice

## License

MIT License - Feel free to use and modify for your own projects.

## Acknowledgements

- Inspired by other GitHub profile counters
- Nixie tube number images used with permission 