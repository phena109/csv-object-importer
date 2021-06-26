FROM php:7.4-fpm-buster

# PORT
EXPOSE 9000

# System
RUN \
apt-get update -y && \
apt-get install -y \
git

# PHP
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions @composer

# ENV
RUN \
cp -f /usr/share/zoneinfo/Australia/Sydney /etc/localtime && \
cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

CMD php-fpm --nodaemonize