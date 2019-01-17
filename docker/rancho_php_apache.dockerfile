FROM php:5.6-apache

#ENV http_proxy http://localhostexemplo:3128
#ENV https_proxy http://ipdoproxy:portaproxy

RUN apt-get update -y && apt-get install -y sendmail libpng-dev
RUN apt-get update -y && apt-get install -y zlib1g-dev

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install mysql
RUN docker-php-ext-install pdo_mysql

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd

COPY ./docker/configs/php.ini /usr/local/etc/php/
RUN chmod -R 2775 /var/www/html
RUN chown -R www-data:www-data /var/www/html
