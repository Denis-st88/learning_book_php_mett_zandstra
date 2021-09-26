#!/usr/bin/env bash

docker-compose run --rm php-fpm_patterns sh -c 'cd .. && composer lint'
docker-compose run --rm php-fpm_patterns sh -c 'cd .. && composer cs-fix'
docker-compose run --rm php-fpm_patterns sh -c 'cd .. && composer cs-check'
docker-compose exec php-fpm_patterns sh