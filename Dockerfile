FROM ubuntu:focal

ARG PHP_VERSION=7.4

RUN addgroup --system nginx && \
     adduser --system --home /var/cache/nginx --shell /sbin/nologin nginx

# Install web components
RUN apt-get update && \
    apt-get install -y software-properties-common && \
    add-apt-repository ppa:ondrej/php

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y \
    cron \
    vim \
    locales \
    locales-all \
    curl \
    wget \
    supervisor \
    nginx \
    libsodium-dev \
    openssl \
    mcrypt \
    ldap-utils \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-gd \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-mysql \
    php${PHP_VERSION}-sqlite \
    php${PHP_VERSION}-soap \
    php${PHP_VERSION}-dom \
    php${PHP_VERSION}-zip \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-json \
    php${PHP_VERSION}-ldap \
    php${PHP_VERSION}-intl \
    php${PHP_VERSION}-xsl \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-opcache \
    php${PHP_VERSION}-bcmath \
    php-dev

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    chmod +x /usr/local/bin/composer

RUN pecl install swoole

# PHP-FPM
ADD docker/conf/php.ini /etc/php/${PHP_VERSION}/fpm/php.ini
ADD docker/conf/php.ini /etc/php/${PHP_VERSION}/cli/php.ini
ADD docker/conf/www.conf /etc/php/${PHP_VERSION}/fpm/pool.d/www.conf


# NGINX config files
ADD docker/conf/nginx.conf /etc/nginx/nginx.conf
ADD docker/conf/nginx-site.conf /etc/nginx/sites-available/default.conf
RUN rm /etc/nginx/sites-enabled/default && \
    ln -s /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/default && \
    mkdir -p /run/php

ADD docker/conf/supervisord.conf /etc/supervisord.conf

# Copy start.sh
ADD docker/scripts/start.sh /usr/bin/start.sh

#RUNNING CRONTAB
COPY docker/scripts/cron /etc/cron.d/custom-cron
RUN chmod 0644 /etc/cron.d/custom-cron
RUN crontab /etc/cron.d/custom-cron
RUN touch /var/log/cron.log

# Setup directories
RUN chmod 755 /usr/bin/start.sh && \
    rm -Rf /var/www/*

# Copy application
ADD . /var/www/html/

# Expose port
EXPOSE 80 1215

# Set the workdir
WORKDIR /var/www/html

# Start the container
CMD ["start.sh"]


