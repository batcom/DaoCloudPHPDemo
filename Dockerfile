FROM php:5.6-apache
# Docker 官方PHP5.6+apache发行版本，底层系统使用Debian

# 道客船长荣誉出品
MAINTAINER Captain Dao (support@daocloud.io)

COPY config/php.ini /usr/local/etc/php/
# 复制php配置文件到Image中

COPY src/ /var/www/html/
# 复制代码到Image中

RUN docker-php-ext-install mysqli
# 安装Mysql依赖模块

EXPOSE 80
