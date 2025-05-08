#!/bin/bash

# Upload the PHP file
scp -i C:\Users\user\Desktop\coding\keys\ssh-key-2025-04-27.key public/simple.php ubuntu@192.18.158.188:/tmp/simple.php
ssh -i C:\Users\user\Desktop\coding\keys\ssh-key-2025-04-27.key ubuntu@192.18.158.188 "sudo mv /tmp/simple.php /var/www/html/nixiecounter/public/"

# Upload the images
scp -i C:\Users\user\Desktop\coding\keys\ssh-key-2025-04-27.key images/*.png ubuntu@192.18.158.188:/tmp/
ssh -i C:\Users\user\Desktop\coding\keys\ssh-key-2025-04-27.key ubuntu@192.18.158.188 "sudo mv /tmp/*.png /var/www/html/nixiecounter/public/images/"

echo "Files uploaded successfully!" 