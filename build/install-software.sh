#!/bin/bash
#

cd /vagrant
sudo add-apt-repository -y ppa:ondrej/php
sudo apt-get -y update
sudo apt-get -y upgrade

echo "[Info] Installing mc"
sudo apt-get -y install mc

echo "[Info] Installing git"
sudo apt-get -y install git

echo "[Info] Installing nginx"
sudo apt-get -y install nginx

echo "[Info] Installing mysql"
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
sudo apt-get -y install mysql-server
sudo apt-get -y install mysql-client
sed -i 's/bind-address/#bind-address/g' /etc/mysql/my.cnf
mysql -u root -proot -e "UPDATE mysql.user SET Host='%' WHERE Host='vagrant-ubuntu-trusty-64' AND User='root';"
mysql -u root -proot -e "UPDATE mysql.user SET Host='%' WHERE Host='app' AND User='root';"
mysql -u root -proot -e "UPDATE mysql.user SET Host='%' WHERE Host='app.int' AND User='root';"
mysql -u root -proot -e "FLUSH PRIVILEGES;"
sudo service mysql restart

echo "[Info] Installing php 7"

sudo add-apt-repository -y ppa:ondrej/php >> /tmp/output.txt 2>&1
sudo apt-get update

sudo apt-get -y install build-essential libmemcached-dev --force-yes
sudo apt-get -y install php7.0 php7.0-cli php7.0-fpm php7.0-dev php7.0-mysql php7.0-intl php-apc php-apcu php-pear php-curl php7.0-gd php7.0-pgsql php7.0-json php7.0-ldap --force-yes
echo "------------------------------"
sudo service php7.0-fpm status
echo "------------------------------"

sudo apt-get -f -y install

curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

cd /root
wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
sudo mv phpunit.phar /usr/local/bin/phpunit

unlink /etc/nginx/sites-enabled/default
usermod -G www-data vagrant

cd /vagrant

sudo chown -R vagrant:www-data /vagrant

