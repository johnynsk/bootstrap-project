# Simple project bootstrap

introduction
-------

Simple project contains nginx, php-fpm, mongodb, memcached.

have pre-defined composer and bootstrap for PSR-0/PSR-4 autoload

moments
------

Runs with docker-compose

upstream: 0.0.0.0:8080, you need to change it.

deploying
------

    cd app
    composer install
    docker-compose up

testing
------

    curl http://localhost:8080/

You will get output from phpinfo function 
