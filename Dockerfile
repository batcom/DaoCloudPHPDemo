# Pull base image.
FROM phpweb

# Install.
#add src
COPY src/ /usr/share/nginx/www/

# private expose
EXPOSE 3306
EXPOSE 80
# volume for mysql database and wordpress install
VOLUME ["/var/lib/mysql", "/usr/share/nginx/www"]
CMD ["/bin/bash", "/start.sh"]
