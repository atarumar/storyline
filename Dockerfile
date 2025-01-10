# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set permissions for writable directories
RUN chown -R www-data:www-data /var/www/html/writable /var/www/html/public

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
