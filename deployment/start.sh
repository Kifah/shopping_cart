#!/usr/bin/env bash

if [ ! -f vendor/autoload.php ]; then
    echo "run composer install"
    composer install
fi


while ! nc -z db-service 3306;
do
  echo "waiting for mysql server";
  sleep 1;
done;


echo "prepare database schema and fixtures"

bin/console doctrine:schema:drop --force
bin/console doctrine:schema:update --force
bin/console doctrine:fixtures:load --no-interaction -v




echo "starting php server"
php -S 0.0.0.0:80 -t public

