# Laravel + Chatbot
This project provide service which can customize chatbot. You can register account and upload your qa pair to customize your chatbot.

# Requirement
* apache 
* PHP >= 7.2
* npm
* mysql >= 14.14
* git

# Installation
## Ubuntu
fetch and upgrade packages
```
apt-get update && apt-get upgrade
```
install apache
```
apt-get install apache2
```
install system requirement
```
apt-get install php
apt-get install php-mysql
apt-get install nodejs
apt-get install npm
apt-get install mysql-server
apt-get install git
```
create database in mysql and schema in database
```
create database chatbot;
source schema.sql
```
clone from git in apache root directory 
```
git clone https://github.com/hjoruhjoru/yrsbot.git
```

modify apache config
```
<VirtualHost *:80>
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html/laravel/public

        <Directory "/var/www/html/laravel/public">
            Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>

```

reload apache config
```
sudo a2enmod rewrite 
```

start apache
```
systemctl start apache2
```
setup laravel environment
```
php artisan package:discover
php artisan key:generate
```

# Screenshot

![Screenshot](yrsbot.PNG)

![Screenshot](chat.PNG)
