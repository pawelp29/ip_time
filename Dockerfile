FROM alpine:latest
LABEL author="Paweł Pańczyk"

RUN apk update && apk add apache2 php8-apache2 \
    && rm /var/www/localhost/htdocs/index.html
COPY files/index.php /var/www/localhost/htdocs/index.php
EXPOSE 80

CMD printf \
    "Server started at $(date)\nAuthor: Paweł Pańczyk\nListening on port 80\n" \
    > /var/www/logs/start.log \
    && /usr/sbin/httpd -D FOREGROUND
