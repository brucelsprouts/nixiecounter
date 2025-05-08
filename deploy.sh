#!/bin/bash

# Create necessary directories
sudo mkdir -p /var/www/html/nixiecounter/public/images
sudo mkdir -p /var/www/html/nixiecounter/storage

# Set permissions
sudo chown -R www-data:www-data /var/www/html/nixiecounter
sudo chmod 755 /var/www/html/nixiecounter
sudo chmod 755 /var/www/html/nixiecounter/public
sudo chmod 755 /var/www/html/nixiecounter/public/images
sudo chmod 777 /var/www/html/nixiecounter/storage

# Install Apache if not already installed
sudo apt-get update
sudo apt-get install -y apache2 php

# Enable PHP module
sudo a2enmod php

# Restart Apache
sudo systemctl restart apache2

echo "Server setup complete! Now you can upload the files." 