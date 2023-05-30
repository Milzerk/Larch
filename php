#!/bin/bash
docker exec -i --user=1000:1000 swooler-php-fpm php "$@"