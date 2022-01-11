# zdenekzahor/bm-calcualtor

Calculator for [Beneš & Michl](https://www.benes-michl.cz/) 🧮 by Šáník

## Setup

1. Create and setup `local.neon` file from sample:
    1. `cp config/local.sample.neon config/local.neon`
1. `cd .docker`
1. Create and setup `.env` file from sample:
   1. `cp sample.env .env`
1. Create and setup `php.ini` file from sample:
   1. `cp images/php/php.sample.ini images/php/php.ini`
1. `docker-compose build`
1. Generate HTTPS certs (replace `/path/to/rootCA` with directory with CA):
   ```
   docker run --rm -it -v /path/to/rootCA:/rootCA -v "$(pwd)/images/web/certs:/certs" --entrypoint sh -u $(id -u):$(id -g) --env-file "$(pwd)/.env" frapsoft/openssl -c ' \
   openssl req -utf8 -new -sha256 -nodes -out /certs/server.csr -newkey rsa:2048 -keyout /certs/server.key && \
   printf "subjectAltName=DNS.1:${WEB_DOMAIN}" > /certs/server.ext && \
   openssl x509 -req -in /certs/server.csr -CA /rootCA/rootCA.pem -CAkey /rootCA/rootCA.key -CAcreateserial -out /certs/server.crt -days 36500 -sha256 -extfile /certs/server.ext'
   ```

## Test

1. `cd .docker`
1. `docker-compose run --rm php composer install`
1. `docker-compose run --rm php composer test`

## Run Web
1. `cd .docker`
1. `docker-compose run --rm php composer install --no-dev`
1. `docker-compose run --rm clientBuildServer npm install --cache /tmp --production`
1. `docker-compose up -d web`

## Build
1. `cd .docker`
1. `docker-compose run --rm php composer install`
1. `docker-compose up -d web`
1. `docker-compose run --rm clientBuildServer npm install --cache /tmp`
1. `docker-compose run --rm clientBuildServer npm run build`
1. `docker-compose up -d clientBuildServer`
