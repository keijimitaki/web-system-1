#FROM ruby:3.1.2-alpine

#FROM ruby:2.6.3-alpine3.9
#FROM ruby:2.6.8-alpine3.14
#FROM ruby:2.7.1-alpine
FROM ruby:3.1

ARG WORKDIR="/var/www/html"
ARG RUNTIME_PACKAGES="linux-headers libxml2-dev make gcc libc-dev nodejs tzdata postgresql-dev postgresql git sqlite-dev" 
ARG DEV_PACKAGES="build-base curl-dev"

ENV HOME=/${WORKDIR} \
    LANG=C.UTF-8 \
    TZ=Asia/Tokyo

WORKDIR ${HOME}

COPY src/Gemfile* ./

# Bundlerの不具合対策(1)
RUN gem update --system
RUN bundle update --bundler

RUN bundle install
RUN apt update -qq && apt install -y postgresql git sqlite3

#RUN apk update && \
#    apk upgrade && \
#    apk add --no-cache ${RUNTIME_PACKAGES} && \
#    apk add --virtual build-dependencies --no-cache ${DEV_PACKAGES} && \
#    bundle install -j4 && \
#    apk del build-dependencies

COPY src .

