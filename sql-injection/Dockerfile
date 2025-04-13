FROM php:7.4-apache
RUN docker-php-ext-install pdo_mysql
COPY index.php /var/www/html/
COPY init.sql /docker-entrypoint-initdb.d/
EXPOSE 80