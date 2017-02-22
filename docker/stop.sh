#!/bin/bash
. $(dirname "$0")/../config/parameters.sh
docker stop ${PHP_CNT}
docker stop ${DB_CNT}
