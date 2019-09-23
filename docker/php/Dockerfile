FROM php:7.2.1-apache-stretch

#  Install the PDO MySQL extensions for PHP
RUN docker-php-ext-install pdo mysqli

# Enable mod_rewrite extension
RUN a2enmod rewrite

# Enable headers extension
RUN a2enmod headers

# Enable expires extension
RUN a2enmod expires
