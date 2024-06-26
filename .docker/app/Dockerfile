# syntax = edrevo/dockerfile-plus

ARG PHP_IMAGE=php:8.3-fpm-alpine

FROM ${PHP_IMAGE} AS build

INCLUDE+ ./.docker/app/.dockerfiles/nginx.Dockerfile
INCLUDE+ ./.docker/app/.dockerfiles/app.Dockerfile
INCLUDE+ ./.docker/app/.dockerfiles/php.Dockerfile
INCLUDE+ ./.docker/app/.dockerfiles/cleanup.Dockerfile

EXPOSE 80

CMD ["/usr/bin/supervisord", "-n"];

## DEVELOPMENT IMAGE
FROM build AS dev

ENV XDEBUG_ENABLED 1
ENV OPCACHE_ENABLED 0

RUN pecl install xdebug-3.3.2 \
    && docker-php-ext-enable xdebug

## PRODUCTION IMAGE
FROM build AS prod

ENV XDEBUG_ENABLED 0
ENV OPCACHE_ENABLED 1

## STAGING IMAGE COPIES PROD
FROM prod AS staging