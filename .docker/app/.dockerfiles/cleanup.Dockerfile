RUN rm -rf /var/cache/apk/*

RUN chown -R www-data:www-data /var/www \
    && chown -R www-data:www-data /usr/local/var/log

WORKDIR /app

STOPSIGNAL SIGTERM

EXPOSE 80
