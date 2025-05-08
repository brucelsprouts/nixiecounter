# Nixie Counter Installation Guide

## Server Requirements

- PHP 7.4 or higher
- PHP GD extension enabled
- Apache or Nginx web server
- Write permissions for the `storage` directory

## Installation Steps

### Apache Server Setup

1. Upload all files to your web server
2. Make sure mod_rewrite is enabled
3. Set the document root to the `public` directory
4. Ensure the .htaccess file is working properly

Example Apache configuration:

```apache
<VirtualHost *:80>
    ServerName nixiecounter.yourdomain.com
    DocumentRoot /path/to/nixiecounter/public
    
    <Directory /path/to/nixiecounter/public>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/nixiecounter-error.log
    CustomLog ${APACHE_LOG_DIR}/nixiecounter-access.log combined
</VirtualHost>
```

### Nginx Server Setup

```nginx
server {
    listen 80;
    server_name nixiecounter.yourdomain.com;
    root /path/to/nixiecounter/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## Directory Permissions

Make sure the storage directory is writable:

```bash
chmod -R 755 /path/to/nixiecounter/storage
chown -R www-data:www-data /path/to/nixiecounter/storage
```

## Testing Your Installation

Once installed, you should be able to access the counter via:

```
http://nixiecounter.yourdomain.com/yourusername
```

## Usage in GitHub Profile

Add this to your GitHub profile README.md:

```markdown
![Nixie Tube Counter](http://nixiecounter.yourdomain.com/yourusername)
```

### Optional Parameters

You can customize the counter with parameters:

```markdown
![Nixie Tube Counter](http://nixiecounter.yourdomain.com/yourusername?digits=8)
```

Available parameters:
- `digits`: Minimum number of digits to display (default: 6)
- `base`: Starting count value (default: 0) 