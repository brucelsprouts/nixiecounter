#!/bin/bash
echo "Starting PHP development server for Nixie Counter..."
echo
echo "Server will be available at http://localhost:8080"
echo
echo "Press Ctrl+C to stop the server"
echo
cd public
php -S localhost:8080 