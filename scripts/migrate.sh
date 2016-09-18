#!/bin/bash
cd /var/www

while [ ! -f /usr/local/etc/app/app.ini ]
do
  sleep 2
done

chown -R www-data:www-data /var/www/*
vendor/bin/phing setup -propertyfile /usr/local/etc/app/app.ini

