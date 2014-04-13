#!/bin/bash

# fail fast
set -e

# Tell apt we don't actually do any input
export DEBIAN_FRONTEND=noninteractive

# install some base packages
apt-get update
apt-get install -y vim git curl

# install apache2
apt-get install -y apache2
sed -i 's/\/var\/www/\/home\/vagrant\/public_html\/workouts\/public/' /etc/apache2/sites-available/default
sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/sites-available/default
a2enmod rewrite
/etc/init.d/apache2 restart

# install php
apt-get install -y php5 php5-cli php5-mysql php5-dev php5-json php5-mcrypt php5-curl libapache2-mod-php5
/etc/init.d/apache2 restart

# install mysql
apt-get install -y mysql-server
mysql -uroot -e "CREATE DATABASE workouts"

# install node
apt-get install -y python-software-properties python g++ make
add-apt-repository -y ppa:chris-lea/node.js
apt-get update
apt-get install -y nodejs
sudo npm install -g grunt-cli bower

# do initial build
su vagrant -c "bash /home/vagrant/public_html/workouts/build.sh"