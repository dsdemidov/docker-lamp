#!/bin/bash
. $(dirname "$0")/../config/parameters.sh

DATE=`date +%Y-%m-%d-%H%M%S`

if [ ! -d "${MYSQL_DUMPS_DIRECTORY}" ];
then
    mkdir ${MYSQL_DUMPS_DIRECTORY}
fi

docker exec ${DB_CNT} sh -c 'exec mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" $MYSQL_DATABASE' \
	> ${PWD}/mysql-dumps/${DATE}-${MYSQL_DATABASE}.sql
