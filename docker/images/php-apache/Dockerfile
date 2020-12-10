FROM php:7.4.4-apache

RUN apt-get update

# Hablilitamos el mod rewrite

RUN a2enmod rewrite

# Cambiamos el document root

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Le instalamos pdo mysql

RUN docker-php-ext-install pdo_mysql

# Le instalamos php zip

RUN apt-get install -y libzip-dev unzip

RUN docker-php-ext-install zip

# Le instalamos composer

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
    mv composer.phar /usr/local/bin/composer

# Configuramos los permisos
RUN mkdir /var/www/html/storage
RUN chmod -R 755 /var/www/html/storage
RUN chown -R www-data:www-data /var/www