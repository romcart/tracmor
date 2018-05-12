#!/bin/bash
set -e # Exit on error

mysql_rootpw="admin0user1"
web_root='/var/www/html'
tracmor_root="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )" # Taken from https://stackoverflow.com/a/246128

tracmor_db_username="tracmor"
tracmor_db_password="tracmor"

#Install Pre-Requisites
sudo add-apt-repository ppa:ondrej/php --yes
sudo apt-get update
sudo apt-get dist-upgrade --assume-yes # reccommended if you have a clean install.

# Set the password for the mysql root user so we don't get asked during the installation
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password $mysql_rootpw'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password $mysql_rootpw'

# Install
sudo apt-get --assume-yes install apache2 libapache2-mod-php5.6 mysql-server mysql-client php5.6 php5.6-mysql php5.6-gd 

# Create the database
mysql --user=root --password=$mysql_rootpw <<< 'CREATE DATABASE tracmor;'
# Init the database
mysql --user=root --password=$mysql_rootpw tracmor < $tracmor_root/data_model/create.sql
mysql --user=root --password=$mysql_rootpw tracmor < $tracmor_root/data_model/data.sql

# Make a 'tracmor' user that has access to the tracmor table
mysql --user=root --password=$mysql_rootpw <<< "CREATE USER '$tracmor_db_username'@'localhost' IDENTIFIED BY '$tracmor_db_password';"
mysql --user=root --password=$mysql_rootpw <<< "GRANT ALL PRIVILEGES ON tracmor.* TO '$tracmor_db_username'@'localhost';"

# Now set the username and password in the tracmor config file... A lot of excapes of the single quotes
sed -i 's/'\''username'\'' => '\'\''/'\''username'\'' => '\'''$tracmor_db_username''\''/g' $tracmor_root/includes/configuration.inc.php
sed -i 's/'\''password'\'' => '\'\''/'\''password'\'' => '\'''$tracmor_db_password''\''/g' $tracmor_root/includes/configuration.inc.php

# Apache should now be running. Let's move tracmor into the web root 
sudo cp -R $tracmor_root/* $web_root/
# And make it owned by www-data
sudo chown -R www-data:www-data $web_root
# get rid of the apache index
sudo rm $web_root/index.html

sudo service apache2 restart

echo ******************************************
echo ******************************************
echo You can now log in to tracmor using the
echo username 'admin' and the pasword 'admin'
echo ******************************************
echo ******************************************
