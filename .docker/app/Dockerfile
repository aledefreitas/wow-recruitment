FROM aledefreitas/php-nginx-env:dev AS dev

FROM aledefreitas/php-nginx-env:prod AS prod

RUN chown -R www-data:www-data /app

COPY --chown=www-data:www-data ./bin /app/bin
COPY --chown=www-data:www-data ./config /app/config
COPY --chown=www-data:www-data ./public /app/public
COPY --chown=www-data:www-data ./src /app/src
COPY --chown=www-data:www-data ./.env /app/.env
COPY --chown=www-data:www-data ./composer.json /app/composer.json
COPY --chown=www-data:www-data ./composer.lock /app/composer.lock
COPY --chown=www-data:www-data ./package.json /app/package.json
COPY --chown=www-data:www-data ./package-lock.json /app/package-lock.json
COPY --chown=www-data:www-data ./symfony.lock /app/symfony.lock

USER www-data

RUN composer install --no-dev -o -a

USER root

FROM prod AS staging

