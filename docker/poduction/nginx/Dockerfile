FROM nginx:1.21-alpine

ADD ./docker/poduction/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf
ADD ./docker/poduction/nginx/conf.d/htpasswd /etc/nginx/conf.d/htpasswd

WORKDIR /var/www

COPY ./public ./public
