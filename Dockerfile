FROM php:7.3-apache

#install all the system dependencies and enable PHP modules 
RUN apt-get update && apt-get -y install git && apt-get -y install zip

RUN  apt-get install -y libmcrypt-dev \
        libmagickwand-dev --no-install-recommends \
        && pecl install mcrypt-1.0.2 \
        && docker-php-ext-install pdo_mysql \
        && docker-php-ext-enable mcrypt

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

#set our application folder as an environment variable
ENV APP_HOME /var/www/html

#change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

#change the web_root to laravel /var/www/html/public folder
RUN sed -i -e "s/html/html\/public/g" /etc/apache2/sites-enabled/000-default.conf

# enable apache module rewrite
RUN a2enmod rewrite

#copy source files and run composer
COPY . /var/www/html
WORKDIR /var/www/html

# install all PHP dependencies
RUN composer install --optimize-autoloader --no-dev

#change ownership of our applications
RUN chown -R www-data:www-data $APP_HOME
RUN chmod -R 755 $APP_HOME