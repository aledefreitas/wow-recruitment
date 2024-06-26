# syntax = edrevo/dockerfile-plus

ARG PHP_IMAGE=php:8.3-fpm-alpine

## DEVELOPMENT IMAGE
FROM ${PHP_IMAGE} AS dev

INCLUDE+ ./.docker/app/.dockerfiles/nginx.Dockerfile
INCLUDE+ ./.docker/app/.dockerfiles/app.Dockerfile
INCLUDE+ ./.docker/app/.dockerfiles/php.Dockerfile
INCLUDE+ ./.docker/app/.dockerfiles/cleanup.Dockerfile

CMD ["/usr/bin/supervisord", "-n"];

## PRODUCTION IMAGE
FROM ${PHP_IMAGE} AS prod

INCLUDE+ ./.docker/app/.dockerfiles/nginx.Dockerfile
INCLUDE+ ./.docker/app/.dockerfiles/app.Dockerfile
INCLUDE+ ./.docker/app/.dockerfiles/php.Dockerfile
INCLUDE+ ./.docker/app/.dockerfiles/cleanup.Dockerfile

CMD ["/usr/bin/supervisord", "-n"];

## STAGING IMAGE COPIES PROD
FROM prod AS staging