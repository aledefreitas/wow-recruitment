RUN apk update

ENV APP_DEPS \
        libxml2-dev \
        libpng-dev \
        libzip-dev \
        libsodium-dev \
        libpq-dev \
        autoconf \
		dpkg-dev \
        dpkg \
		file \
		g++ \
		gcc \
		libc-dev \
		make \
		pkgconf \
		re2c

RUN apk add ${APP_DEPS}

RUN APP_PACKAGES=" \
        nodejs \
        npm \
        wget \
        gnupg \
        supervisor \
    " \
    && apk add ${APP_PACKAGES}