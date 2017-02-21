#!/bin/bash
. $(dirname "$0")/../parameters.sh
docker stop ${PHP_CNT}
docker stop ${DB_CNT}
docker rm ${PHP_CNT}
docker rm ${DB_CNT}
