#!/bin/bash
#

sudo unlink /etc/nginx/sites-enabled/app.conf
sudo unlink /etc/nginx/sites-available/app.conf

sudo cp /vagrant/build/nginx-hosts/app.conf /etc/nginx/sites-available/app.conf
sudo ln -s /etc/nginx/sites-available/app.conf /etc/nginx/sites-enabled/app.conf

sudo unlink /etc/php/7.0/fpm/pool.d/www.conf
sudo cp /vagrant/build/php-fpm-pool/app.conf /etc/php/7.0/fpm/pool.d/app.conf


sudo service php7.0-fpm restart
sudo service nginx restart