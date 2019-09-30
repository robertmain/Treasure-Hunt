FROM php:7.2.1-apache-stretch

# Enable mod_rewrite extension
RUN a2enmod rewrite

# Enable headers extension
RUN a2enmod headers

# Enable expires extension
RUN a2enmod expires

# Update package listing
RUN apt-get update

# Install some base extensions
RUN apt-get install -y git libzip-dev zip

# Configure PHP zip extension to use libzip before installing
RUN docker-php-ext-configure zip --with-libzip

#  Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
