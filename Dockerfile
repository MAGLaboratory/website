FROM php:8.4.12-apache

RUN a2enmod rewrite

COPY home/public/ /var/www/html/
COPY home/protected/ /var/www/protected/
COPY home/conf/ /var/www/conf/
