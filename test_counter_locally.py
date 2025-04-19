import os
from PIL import Image

# Configuration
TEST_COUNT = "12345"  # This value will be displayed
DIGITS_PATH = "nixie numbers"
OUTPUT_FILE = "test_counter.png"

# Generate counter image using nixie tube digits
def create_counter_image(count):
    # Pad to 11 digits with leading zeros (00000012345)
    padded_count = count.zfill(11)
    
    print(f"Generating counter with value: {padded_count}")
    
    # Load digit images
    digit_images = []
    for digit in padded_count:
        img_path = os.path.join(DIGITS_PATH, f"{digit}.png")
        print(f"Loading image: {img_path}")
        
        # Make sure the file exists
        if not os.path.exists(img_path):
            print(f"Warning: Image file not found: {img_path}")
            continue
            
        digit_images.append(Image.open(img_path))
    
    if not digit_images:
        print("Error: No digit images could be loaded. Make sure the 'nixie numbers' folder contains the digit PNG files (0.png, 1.png, etc.)")
        return
    
    # Calculate final image dimensions
    width = sum(img.width for img in digit_images)
    height = max(img.height for img in digit_images)
    
    # Create final image with black background
    final_image = Image.new('RGBA', (width, height), (0, 0, 0, 255))
    
    # Paste each digit
    x_offset = 0
    for img in digit_images:
        final_image.paste(img, (x_offset, 0), img)
        x_offset += img.width
    
    # Save the final image
    final_image.save(OUTPUT_FILE)
    print(f"Counter image saved as {OUTPUT_FILE}")

# Main process
if __name__ == "__main__":
    print("Testing nixie tube counter image generation")
    create_counter_image(TEST_COUNT) 