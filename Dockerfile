FROM ambientum/php:7.4-nginx

LABEL maintainer="Fagner Nunes Lopes"

USER root

RUN apk add --no-cache --force-broken-world \
    nodejs \
    nodejs-npm \
    yarn

USER ambientum
