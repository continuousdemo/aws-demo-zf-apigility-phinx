#!/bin/bash
service apache2 restart > /dev/null 2>&1 &
service php5-fpm restart > /dev/null 2>&1 &
