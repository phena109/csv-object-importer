FROM httpd:2.4
ARG APACHE_LOG_DIR

# PORT
EXPOSE 80

# ENV
RUN cp -f /usr/share/zoneinfo/Australia/Sydney /etc/localtime

# Apache
RUN \
echo "Include conf/custom.conf" >> /usr/local/apache2/conf/httpd.conf && \
echo "Include conf/vhost.conf" >> /usr/local/apache2/conf/httpd.conf && \
sed -i 's|DirectoryIndex index.html|DirectoryIndex /index.php index.php index.html|' /usr/local/apache2/conf/httpd.conf
RUN \
mkdir ${APACHE_LOG_DIR} && \
ln -s /dev/stdout ${APACHE_LOG_DIR}/access.log && \
ln -s /dev/stderr ${APACHE_LOG_DIR}/error.log
