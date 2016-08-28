#!/bin/bash

while [ ! -f /usr/local/etc/app/app.ini ]
do
    sleep 2
done

rm -rf /var/www/*
