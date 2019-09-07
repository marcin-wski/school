FROM ubuntu:latest

RUN apt-get update && apt-get upgrade -y
RUN apt-get install vim git curl zip sed apache2 -y
RUN ln -fs /usr/share/zoneinfo/US/Pacific /etc/localtime
RUN apt-get install mysql-client php libapache2-mod-php php-mysql php7.2-cli php7.2-curl php7.2-gd php7.2-mbstring php7.2-mysql php7.2-xml -y
RUN sed -i "s+DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm+DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm+g" /etc/apache2/mods-enabled/dir.conf
RUN service apache2 start
RUN git clone https://github.com/csuntechlab/affinity.git /var/www/html/affinity
RUN chown -hR www-data:www-data /var/www/html/affinity/
RUN ls -all /var/www/html/affinity/
RUN ln -s /var/www/html/affinity/public /var/www/html/public
RUN ls /var/www/html
RUN sed -i "s+/var/www/html+/var/www/html/public+g" /etc/apache2/sites-available/000-default.conf
RUN sed -i "s+Require all denied+Require all granted+g" /etc/apache2/apache2.conf
RUN service apache2 restart
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /var/www/html/affinity && composer install
