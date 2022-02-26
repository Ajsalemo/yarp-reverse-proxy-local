FROM php:8.1.3-apache

COPY index.php config.php todo.php /var/www/html/
# Start and enable SSH
ENV SSH_PASSWD "root:Docker!"
RUN apt-get update \
    && apt-get install -y --no-install-recommends dialog \
    && apt-get update \
    && apt-get install -y --no-install-recommends openssh-server \
    && docker-php-ext-install pdo_mysql \
    && echo "$SSH_PASSWD" | chpasswd 

COPY sshd_config /etc/ssh/

EXPOSE 80 2222