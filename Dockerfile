# Pull base image.
FROM ubuntu:14.04

# Install.

#add src
COPY src/ /usr/share/nginx/www/

 # mysql config
ADD ./my.cnf /etc/mysql/my.cnf
# nginx config
ADD ./nginx.conf /etc/nginx/nginx.conf
ADD ./fastcgi_params /etc/nginx/fastcgi_params
ADD ./default.conf /etc/nginx/conf.d/default.conf
RUN chmod 755 -R /usr/share/nginx
RUN chown nginx:nginx -R /usr/share/nginx
#php config
ADD ./php.ini /etc/php5/fpm/php.ini
ADD ./php.ini /etc/php5/cli/php.ini
ADD ./php-fpm.conf /etc/php5/fpm/php-fpm.conf
ADD ./www.conf /etc/php5/fpm/pool.d/www.conf

# Supervisor Config
ADD ./supervisord.conf /etc/supervisord.conf
ADD ./start.sh /start.sh
ADD ./cron/crontab /etc/crontab
ADD cron/ /root/cron/
RUN chmod 755 /start.sh
# private expose
EXPOSE 3306
EXPOSE 80
# volume for mysql database and wordpress install
VOLUME ["/var/lib/mysql", "/usr/share/nginx/www"]
CMD ["/bin/bash", "/start.sh"]
