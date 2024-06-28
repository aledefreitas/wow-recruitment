ENV PHP_EXTENSION_DEPS \
        libevent-dev \
        pcre-dev \
        icu-dev \
        oniguruma oniguruma-dev \
        gmp-dev \
        linux-headers \
        libintl \
        ldb-dev \
        libldap \
        openldap-dev \
        libxslt-dev \
        gettext-dev \
        rabbitmq-c-dev \
        libmemcached-dev \
        imagemagick  \
        imagemagick-dev \
        librdkafka

RUN apk add ${PHP_EXTENSION_DEPS}

RUN docker-php-ext-install opcache
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install soap
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install bz2
RUN docker-php-ext-install calendar
RUN docker-php-ext-install exif
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pgsql
RUN docker-php-ext-install intl
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install gmp
RUN docker-php-ext-install sockets
RUN docker-php-ext-install gettext
RUN docker-php-ext-install ldap
RUN docker-php-ext-install xsl

RUN pecl install event-3.1.3 \
    ## ext-event must be loaded last
    ## @see https://github.com/docker-library/php/issues/857#issuecomment-509800804
    && docker-php-ext-enable --ini-name=zz-event.ini event

RUN pecl install amqp-2.1.2 \
    && docker-php-ext-enable amqp

RUN pecl install memcached-3.2.0 \
    && docker-php-ext-enable memcached

RUN pecl install redis-6.0.2 \
    && docker-php-ext-enable redis

RUN apk add librdkafka-dev
RUN pecl install rdkafka-6.0.3 \
    && docker-php-ext-enable rdkafka

ARG IMAGICK_VERSION=3.7.0

# Imagick is installed from the archive because regular installation fails
# See: https://github.com/Imagick/imagick/issues/643#issuecomment-1834361716
RUN curl -L -o /tmp/imagick.tar.gz https://github.com/Imagick/imagick/archive/refs/tags/${IMAGICK_VERSION}.tar.gz \
    && tar --strip-components=1 -xf /tmp/imagick.tar.gz \
    && phpize \
    && ./configure \
    && make \
    && make install \
    && echo "extension=imagick.so" > /usr/local/etc/php/conf.d/ext-imagick.ini \
    && rm -rf /tmp/*

# Install Composer.
ENV PATH=$PATH:/root/composer/vendor/bin \
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/home/www-root/.composer
RUN cd /opt \
    && apk add coreutils libevent \
    && mkdir -p $COMPOSER_HOME \
    && chown -R www-data:www-data $COMPOSER_HOME \
    # Download installer and check for its integrity.
    && curl -sSL https://getcomposer.org/installer > composer-setup.php \
    && curl -sSL https://composer.github.io/installer.sha384sum > composer-setup.sha384sum \
    && sha384sum --check composer-setup.sha384sum \
    # Install Composer 2.
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer --2 \
    # Remove installer files.
    && rm /opt/composer-setup.php /opt/composer-setup.sha384sum

RUN for i in 0 1 2 3; do echo -e "[upstream$i]\nlisten = /var/run/php-upstream$i.sock;\ninclude=/usr/local/etc/php-fpm.d/www-common.conf" > /usr/local/etc/php-fpm.d/www-upstream${i}.conf; done

RUN NGINX_PHP_FPM_CONF="/etc/nginx/php-fpm-upstream.conf"; \
    echo -e "upstream php_fpm_upstream {" > $NGINX_PHP_FPM_CONF; \
    for i in 0 1 2 3; do echo -e "server  unix:/var/run/php-upstream${i}.sock max_fails=3 fail_timeout=30;" >> $NGINX_PHP_FPM_CONF; done; \
    echo -e "}" >> $NGINX_PHP_FPM_CONF

# Install Symfony CLI
RUN apk add --no-cache bash
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | /bin/sh
RUN apk add symfony-cli