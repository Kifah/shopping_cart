#!/usr/bin/env bash

if [ ! -f vendor/autoload.php ]; then
    echo "run composer install"
    composer install
fi

echo "starting php server"
php -S 0.0.0.0:80 -t public

