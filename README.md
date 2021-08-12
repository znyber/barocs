# barocs
barocs
Template OCS_PANEL hosting/vps/vpn seller with ACL 
``
``
integrated webmin api & python web serv api direct execute bash script
``
``
RHL/RHEL base
```
yum localinstall https://dev.mysql.com/get/mysql57-community-release-el7-9.noarch.rpm
yum install mysql-community-server
grep 'A temporary password' /var/log/mysqld.log |tail -1
service mysqld start
/usr/bin/mysql_secure_installation
yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
yum install yum-utils
yum-config-manager --enable remi-php56 
yum-config-manager --enable remi-php56
yum install php php-mcrypt php-cli php-gd php-curl php-mysql php-ldap php-zip php-fileinfo libxml2 libicu57 libxml-parser-perl unzip php-ssh2 php php-cli php-common php-curl php-fpm php-json php-mbstring php-mcrypt php-mysql php-xml
vi /etc/yum.repos.d/webmin.repo
````
````
[Webmin]
name=Webmin Distribution Neutral
#baseurl=http://download.webmin.com/download/yum
mirrorlist=http://download.webmin.com/download/yum/mirrorlist
enabled=1
wget http://www.webmin.com/jcameron-key.asc
sudo rpm --import jcameron-key.asc
yum install webmin
yum install perl-XML-Parser
````
----ubuntu-----
```
vi /etc/apt/sources.list
deb http://download.webmin.com/download/repository sarge contrib
deb http://webmin.mirror.somersettechsolutions.co.uk/repository sarge contrib
wget http://www.webmin.com/jcameron-key.asc
apt-key add jcameron-key.asc
apt update
apt install webmin
vi /etc/webmin/miniserv.conf
ssl=0
/etc/init.d/webmin restart
apt install libxml-parser-perl
```
