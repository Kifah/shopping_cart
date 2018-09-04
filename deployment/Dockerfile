FROM php:7.2-cli
RUN apt-get update && apt-get install -y iputils-ping netcat ssh-client git
#install composer
RUN apt-get update &&  apt-get -qy install curl  git ssh-client iputils-ping
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN apt-get install  -y --no-install-recommends libzip-dev
RUN pecl install zip && docker-php-ext-enable zip
RUN docker-php-ext-install pcntl


#pdo-mysql
RUN docker-php-ext-install pdo_mysql
