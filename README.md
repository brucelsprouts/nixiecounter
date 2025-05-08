# Nixie Tube GitHub Profile Visitor Counter

A retro-style visitor counter for your GitHub profile using vintage Nixie tube aesthetics.

## How It Works

This counter displays your GitHub profile views with the classic look of Nixie tube displays - those vintage numerical indicators used in the 1960s and 70s that gave off a warm orange glow.

## Usage

Add the following to your GitHub profile README.md:

```markdown
![Nixie Counter](http://your-server-domain.com/your-github-username)
```

Replace `your-server-domain.com` with the domain where you've hosted this counter, and `your-github-username` with your actual GitHub username.

## Local Testing

For local testing, use a PHP server:

```bash
cd nixiecounter/public
php -S localhost:8080
```

Then you can test the counter by visiting:
- http://localhost:8080/anyusername

## Installation

1. Copy all files to your web server
2. Make sure the `storage` directory is writable
3. Ensure PHP has the GD library enabled

## Features

- Authentic retro Nixie tube style
- Counts profile views
- Unique counter per GitHub username
- Easy to integrate into any GitHub profile

## License

MIT License 