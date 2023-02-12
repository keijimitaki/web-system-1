FROM python:3

ENV PYTHONUNBUFFERED 1

WORKDIR /var/www/html

COPY src/requirements.txt /var/www/html

RUN pip install -r requirements.txt

COPY src/* /var/www/html