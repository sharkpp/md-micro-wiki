#!/bin/bash

# inital working directory is '/home/vagrant'

TMPL_DIR=/vagrant/vagrant

##########################################
# install packages
##########################################

if [ ! -e /etc/yum.repos.d/epel.repo ] ; then
	sudo rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
fi
if [ ! -e /etc/yum.repos.d/remi.repo ] ; then
	sudo rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
fi

sudo yum -y install httpd
sudo chkconfig httpd on

sudo yum install -y --enablerepo=remi mysql-server
sudo chkconfig mysqld on

sudo yum install -y --enablerepo=remi --enablerepo=remi-php55 \
         php php-mbstring php-mcrypt php-pdo php-mysqlnd php-opcache \
             php-xml php-pear php-phpunit-PHPUnit

sudo service mysqld start

sudo cp -f $TMPL_DIR/00_httpd_port_8080.conf /etc/httpd/conf.d/port_8080.conf

mysql -u root < $TMPL_DIR/00_mysql_set_password.sql

##########################################
# setup phpMyAdmin
##########################################

sudo yum install -y --enablerepo=remi --enablerepo=remi-php55 phpMyAdmin

sudo mkdir -p /usr/share/phpMyAdmin/config/
sudo cp $TMPL_DIR/01_phpMyAdmin_config.inc.php /usr/share/phpMyAdmin/config/config.inc.php

##########################################
# setup
##########################################

sudo cp -pf "/usr/share/zoneinfo/Asia/Tokyo" "/etc/localtime"

pushd /vagrant

mysql -u root --password=root < $TMPL_DIR/03_site_create_database.sql

mysql -u root --password=root < $TMPL_DIR/03_site_create_test_database.sql

rm -f fuel/app/config/development/migrations.php
php oil r migrate --all

sudo cp -f $TMPL_DIR/03_site_httpd.conf /etc/httpd/conf.d/site.conf

popd

sudo service httpd start
