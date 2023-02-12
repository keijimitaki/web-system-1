FROM nginx:stable-alpine
 
WORKDIR /etc/nginx/conf.d
 
COPY nginx/nginx.conf .
 
RUN mv nginx.conf default.conf

WORKDIR /var/www/html
 
COPY src .

#CMD /usr/sbin/nginx -g 'daemon off;' -c /etc/nginx/nginx.conf

