FROM php:8.1.3-apache

COPY . /var/www/html/

RUN docker-php-ext-install pdo_mysql

COPY sshd_config /etc/ssh/

# Start and enable SSH
ENV SSH_PASSWD "root:Docker!"
RUN apt-get update \
    && apt-get install -y --no-install-recommends dialog \
    && apt-get update \
    && apt-get install -y --no-install-recommends openssh-server \
    && echo "$SSH_PASSWD" | chpasswd 

EXPOSE 80 2222