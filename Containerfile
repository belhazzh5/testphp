FROM php:8.2-apache

# Copy website files
COPY public/ /var/www/html/

# Enable Apache rewrite module (optional for CMS)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN a2enmod rewrite

# Set correct permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Expose port
EXPOSE 8070

