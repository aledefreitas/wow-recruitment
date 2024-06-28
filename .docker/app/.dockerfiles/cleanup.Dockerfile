RUN rm -rf /var/cache/apk/*

RUN chown -R www-data:www-data /var/www \
    && chown -R www-data:www-data /usr/local/var/log

RUN addgroup nginx www-data \
    && chown -R nginx:nginx /var/cache/nginx

WORKDIR /app

STOPSIGNAL SIGTERM

EXPOSE 80
