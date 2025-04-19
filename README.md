# Nixie Tube GitHub Profile Views Counter

A custom GitHub profile views counter that displays visitor counts using stylish nixie tube digit images. This creates a retro-looking digital counter for your GitHub profile without requiring you to host a server.

![Example Nixie Counter](https://raw.githubusercontent.com/YOURUSERNAME/nixiecreadme/main/counter.png)

## How It Works

This counter leverages GitHub Actions and the komarev.com visitor counter service:

1. A GitHub Actions workflow runs hourly
2. It fetches your profile view count from komarev.com
3. It generates a custom image using nixie tube digit images
4. The image is committed back to the repository
5. Your GitHub profile README displays this image

## Setup Instructions

### 1. Fork this repository

First, fork this repository to your own GitHub account.

### 2. Add the counter to your GitHub profile README

Add the following line to your GitHub profile README.md:

```markdown
![Nixie Tube Visitor Counter](https://raw.githubusercontent.com/YOURUSERNAME/nixiecreadme/main/counter.png)
```

Replace `YOURUSERNAME` with your actual GitHub username.

### 3. Trigger the workflow

Go to the "Actions" tab in your forked repository and manually trigger the "Update Nixie Counter" workflow to generate your first counter image.

After the initial setup, the counter will update automatically once per hour.

## Customization

You can customize how your counter looks by modifying the GitHub Actions workflow:

- Change the padding amount (currently set to 11 digits)
- Adjust the update frequency (currently set to once per hour)
- Modify the background color

## How It Counts Visitors

This counter uses the komarev.com service to track actual profile views. The counter images (0-9.png) are then dynamically arranged based on your current view count.

## License

This project is open source and available under the MIT license.