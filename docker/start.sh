#!/bin/bash
. $(dirname "$0")/../parameters.sh

docker build -t ${PHP_APP_IMAGE_NAME} .

docker run -d --name ${DB_CNT} \
	-v ${PWD}/docker-db-entrypoint:/docker-entrypoint-initdb.d \
	-v ${PWD}/mysql:/var/lib/mysql \
	-v ${PWD}/config/mysql:/etc/mysql/conf.d \
	-e MYSQL_ROOT_PASSWORD=${MYSQL_ROOT_PASSWORD} \
	-e MYSQL_DATABASE=${MYSQL_DATABASE} \
	mysql:latest
docker run -d -p ${EXPOSED_WEB_PORT}:80 \
	--name ${PHP_CNT} \
	--link ${DB_CNT}:${DB_CNT} \
	-v ${WWW_DIR}:/var/www/html \
	${PHP_APP_IMAGE_NAME}
