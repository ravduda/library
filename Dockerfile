FROM php:7.4-apache
WORKDIR /var/www/html/
ADD ./ /var/www/html/
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
EXPOSE 80
