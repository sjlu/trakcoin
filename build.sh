#!/bin/bash

# fail fast
set -e

# tell bower not to send us inputs
export CI=true

# change to path
cd "$(dirname "$0")"

# download composer
curl -sS https://getcomposer.org/installer | php

# install deps
php composer.phar update

# migrate db
php artisan migrate

# install bower components
bower install

# install npm components
# and build assets
npm install
grunt
