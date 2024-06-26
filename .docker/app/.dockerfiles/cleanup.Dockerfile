RUN rm -rf /var/cache/apk/*

WORKDIR /app

STOPSIGNAL SIGTERM
