# GitHub Profile Nixie Tube Visitor Counter

This example shows how to create a static Nixie tube counter display in your GitHub README.md file.

## Static Counter Example

<div align="center">
  <img src="nixie numbers/1.png" width="60" alt="1">
  <img src="nixie numbers/2.png" width="60" alt="2">
  <img src="nixie numbers/3.png" width="60" alt="3">
  <img src="nixie numbers/4.png" width="60" alt="4">
  <img src="nixie numbers/5.png" width="60" alt="5">
</div>

## How to Use in Your README

1. Upload the Nixie tube number images to your repository
2. Add the following HTML to your README.md file, adjusting the paths as needed:

```html
<div align="center" style="background-color: #000; padding: 10px; border-radius: 10px; display: inline-block;">
  <img src="path/to/nixie/numbers/0.png" width="60" alt="0">
  <img src="path/to/nixie/numbers/0.png" width="60" alt="0">
  <img src="path/to/nixie/numbers/0.png" width="60" alt="0">
  <img src="path/to/nixie/numbers/0.png" width="60" alt="0">
  <img src="path/to/nixie/numbers/0.png" width="60" alt="0">
</div>
```

3. Replace the image paths with the actual paths to your Nixie tube number images
4. Update the numbers as your profile view count increases

## Using with GitHub Raw URLs

If you want to reference the images directly from your repository, you can use GitHub raw URLs:

```html
<div align="center" style="background-color: #000; padding: 10px; border-radius: 10px; display: inline-block;">
  <img src="https://raw.githubusercontent.com/username/repo/main/nixie%20numbers/1.png" width="60" alt="1">
  <img src="https://raw.githubusercontent.com/username/repo/main/nixie%20numbers/2.png" width="60" alt="2">
  <img src="https://raw.githubusercontent.com/username/repo/main/nixie%20numbers/3.png" width="60" alt="3">
  <img src="https://raw.githubusercontent.com/username/repo/main/nixie%20numbers/4.png" width="60" alt="4">
  <img src="https://raw.githubusercontent.com/username/repo/main/nixie%20numbers/5.png" width="60" alt="5">
</div>
```

Replace `username/repo` with your GitHub username and repository name.

## Adding a Background

To make the Nixie tubes stand out better, you can add a black background:

```html
<div align="center">
  <div style="background-color: #000; padding: 10px; border-radius: 10px; display: inline-block;">
    <img src="nixie numbers/1.png" width="60" alt="1">
    <img src="nixie numbers/2.png" width="60" alt="2">
    <img src="nixie numbers/3.png" width="60" alt="3">
    <img src="nixie numbers/4.png" width="60" alt="4">
    <img src="nixie numbers/5.png" width="60" alt="5">
  </div>
</div>
```

Note: GitHub's markdown renderer may strip some CSS styles for security reasons. You might need to adjust the approach based on what GitHub allows.