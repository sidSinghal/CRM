#!/bin/bash
str=$"/n"
sstr=$(echo -e $str)
apt-get install python-software-properties
apt-get update
apt-get -y install software-properties-common
apt-add-repository ppa:brightbox/ruby-ng
apt-get update
apt-get -y install ruby2.3
apt-get install ruby2.3-dev
apt-get update
apt-get install python-pip
apt-get install wget
cd /home/ubuntu
wget https://aws-codedeploy-us-east-1.s3.amazonaws.com/latest/install
chmod +x ./install
sudo ./install auto
service codedeploy-agent start
service codedeploy-agent status
apt-get install apache2 -y
a2enmod ssl
apt-get install openssl
a2enmod rewrite
add-apt-repository ppa:ondrej/php
echo "$sstr"
apt-get update
apt-get -y install php5.6 php5.6-mcrypt php5.6-mbstring php5.6-curl php5.6-cli php5.6-mysql php5.6-gd php5.6-intl php5.6-xsl php5.6-zip
service apache2 start
groupadd www
usermod -a -G www ubuntu
chown -R root:www /var/www
chmod 777 /var/www
find /var/www -type d -exec chmod 777 {} +
find /var/www -type f -exec chmod 777 {} +
echo "<?php phpinfo(); ?>" > /var/www/html/phpinfo.php