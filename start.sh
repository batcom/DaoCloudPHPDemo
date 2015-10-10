#!/bin/bash
chmod -R 777 /usr/share/nginx/www/
cron
# start all the services
/usr/bin/supervisord -n -c /etc/supervisord.conf
read
read
read
sleep 9999999999999999999999999999999999
sleep 9999999999999999999999999999999999
sleep 9999999999999999999999999999999999