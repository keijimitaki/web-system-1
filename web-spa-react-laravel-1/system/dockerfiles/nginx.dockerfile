FROM nginx:stable-alpine
 
WORKDIR /etc/nginx/conf.d
 
COPY nginx/nginx.conf .
 
RUN mv nginx.conf default.conf

WORKDIR /var/www/html
 
#COPY src/front ./
COPY src/back ./api
#COPY src/back ./
COPY src/front ./front



