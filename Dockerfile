from php:5-apache
MAINTAINER Tiago G. Ribeiro <tiago.sistema@yahoo.com>

ENV COMPOSER_ALLOW_SUPERUSER=1

# Packages
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    wget \
    libmcrypt-dev \
    libreadline-dev

# Instalando Composer
RUN curl -sS https://getcomposer.org/installer | php \
  && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

# Instalando o timezone no PHP
RUN echo "date.timezone = America/Sao_Paulo" > /usr/local/etc/php/php.ini

RUN docker-php-ext-install mcrypt

#mod_rewrite
RUN a2enmod rewrite
