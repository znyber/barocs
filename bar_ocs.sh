#!/bin/bash
apt install python3-pip -y
mkdir -p /var/www/html
cd /var
mboh=$(dig @resolver1.opendns.com ANY myip.opendns.com +short)
git clone https://github.com/znyber/wg_config.git
chmod -R 777 wg_config
cd wg_config
pwd
pip3 install flask
read -p "Press enter to continue"
./wireguard-install.sh
read -p "Press enter to continue"
./openvpn-install.sh
read -p "Press enter to continue"
SERVER_PRIV_KEY=$(wg genkey)
SERVER_PUB_KEY=$(echo "$SERVER_PRIV_KEY" | wg pubkey)
mboh=$(dig @resolver1.opendns.com ANY myip.opendns.com +short)
patokan=$(echo "\$_SERVER_PORT")
cat <<EOF > /var/wg_config/wg.def
_INTERFACE=wg0
_VPN_NET=10.76.0.0/23,fd42:42:42::1/64
_SERVER_PORT=7676
_SERVER_LISTEN=$mboh:$patokan
_SERVER_PUBLIC_KEY=$SERVER_PRIV_KEY
_SERVER_PRIVATE_KEY=$SERVER_PUB_KEY
EOF

cat <<EOF > /etc/openvpn/server/server.conf
port 445
proto tcp
dev tun
ca ca.crt
cert server.crt
key server.key
dh dh.pem
client-cert-not-required
username-as-common-name
plugin /usr/lib/x86_64-linux-gnu/openvpn/plugins/openvpn-plugin-auth-pam.so login
server 10.8.0.0 255.255.255.0
push "redirect-gateway def1 bypass-dhcp"
ifconfig-pool-persist ipp.txt
push "dhcp-option DNS 10.7.0.1"
keepalive 10 120
user nobody
group nogroup
persist-key
persist-tun
status openvpn-status.log
verb 3
EOF

cat <<EOF > /etc/openvpn/server/server-udp.conf
port 443
proto udp
dev tun
ca ca.crt
cert server.crt
key server.key
dh dh.pem
client-cert-not-required
username-as-common-name
plugin /usr/lib/x86_64-linux-gnu/openvpn/plugins/openvpn-plugin-auth-pam.so login
server 10.7.0.0 255.255.255.0
push "redirect-gateway def1 bypass-dhcp"
ifconfig-pool-persist ipp.txt
push "dhcp-option DNS 10.7.0.1"
keepalive 10 120
user nobody
group nogroup
persist-key
persist-tun
status openvpn-status.log
verb 3
EOF

./user.sh -a oesman
echo "deb http://download.webmin.com/download/repository sarge contrib" >> /etc/apt/sources.list
echo "deb http://webmin.mirror.somersettechsolutions.co.uk/repository sarge contrib" >> /etc/apt/sources.list
wget http://www.webmin.com/jcameron-key.asc
apt-key add jcameron-key.asc
apt update && apt upgrade
apt install dropbear stunnel squid sslh python3-pip python3 simple-obfs shadowsocks-libev webmin libxml-parser-perl openssl  apache2-utils
sed -i '10s/.*/ssl=0/' /etc/webmin/miniserv.conf
mboh=$(dig @resolver1.opendns.com ANY myip.opendns.com +short)
cat <<EOF > /etc/default/sslh
RUN=yes
DAEMON=/usr/sbin/sslh
DAEMON_OPTS="--user sslh --listen  $mboh:443 --ssh 0.0.0.0:444 --openvpn 0.0.0.0:445 --ssl 0.0.0.0:143 --ssl 0.0.0.0:3129 --ssl 0.0.0.0:990 --http 127.0.0.1:3128 --pidfile /var/run/sslh/sslh.pid"

EOF
echo 'NO_START=0' > /etc/default/dropbear
echo 'DROPBEAR_PORT=444' >> /etc/default/dropbear
echo 'DROPBEAR_EXTRA_ARGS=' >> /etc/default/dropbear
echo 'DROPBEAR_BANNER="/etc/banner.txt"' >> /etc/default/dropbear
echo 'DROPBEAR_RECEIVE_WINDOW=65536' >> /etc/default/dropbear

cat <<EOF > /etc/banner.txt
<br><font color='#000000'>=======================================</br></font>
<br><font color='#008080'>***************** <b>SSH Premium for Kadal family</b> ****************</br></font>
<br><font color='#000000'>=======================================</br></font>
<br></br>
<br><font color='#FF0000'>****************** <b>!!!WARNING!!!</b> ******************</br></font>
<br></br>
<br>█__█__██__████___██__█</br>
<br>█_█__█__█_█___█_█__█_█</br>
<br>██___████_█___█_████_█</br>
<br>█_█__█__█_█___█_█__█_█</br>
<br>█__█_█__█_████__█__█_█████</br>
<br></br></font>
<br><font color='#FF0000'>Kalian tahu aturanya kan...</br></font>
<br></br>
<br><font color='#000000'>=======================================</br></font>
<br><font color='#0000FF'>************** <b>Created by Donator Kadal Family</b> ***************</br></font>
<br><font color='#000000'>=======================================</br></font>
EOF

cat <<EOF > /etc/banner-ssh.net

███████╗███╗   ██╗██╗   ██╗██████╗ ███████╗██████╗ 
╚══███╔╝████╗  ██║╚██╗ ██╔╝██╔══██╗██╔════╝██╔══██╗
  ███╔╝ ██╔██╗ ██║ ╚████╔╝ ██████╔╝█████╗  ██████╔╝
 ███╔╝  ██║╚██╗██║  ╚██╔╝  ██╔══██╗██╔══╝  ██╔══██╗
███████╗██║ ╚████║   ██║   ██████╔╝███████╗██║  ██║
╚══════╝╚═╝  ╚═══╝   ╚═╝   ╚═════╝ ╚══════╝╚═╝  ╚═╝
                                                   
EOF
sed -i '109s!.*!Banner /etc/banner-ssh.net!' /etc/ssh/sshd_config
htpasswd -c /etc/squid/.squid_users oesman
mboh=$(dig @resolver1.opendns.com ANY myip.opendns.com +short)
cat <<EOF > /etc/squid/squid.conf
http_port $mboh:8080
http_port $mboh:80
http_port 127.0.0.1:3128
acl localhost src 127.0.0.1/32 ::1
acl to_localhost dst 127.0.0.0/8 0.0.0.0/32 ::1
acl localnet src 10.0.0.0/8
acl localnet src 172.16.0.0/12
acl localnet src 192.168.0.0/16
acl localnet src fc00::/7
acl localnet src fe80::/10
acl SSL_ports port 443
acl Safe_ports port 80
acl Safe_ports port 21
acl Safe_ports port 443
acl Safe_ports port 70
acl Safe_ports port 210
acl Safe_ports port 1025-65535
acl Safe_ports port 280
acl Safe_ports port 488
acl Safe_ports port 591
acl Safe_ports port 777
acl CONNECT method CONNECT
acl SSH dst $mboh-$mboh/32
auth_param basic program /usr/lib/squid/basic_ncsa_auth /etc/squid/.squid_users
auth_param basic children 5
auth_param basic realm Proxy Authentication Required
auth_param basic credentialsttl 2 hours
auth_param basic casesensitive off
acl authen proxy_auth REQUIRED
http_access allow SSH
http_access allow authen
http_access allow manager localhost
http_access deny manager
http_access allow localnet
http_access allow localhost
http_access deny all
hierarchy_stoplist cgi-bin ?
coredump_dir /var/spool/squid
refresh_pattern ^ftp: 1440 20% 10080
refresh_pattern ^gopher: 1440 0% 1440
refresh_pattern -i (/cgi-bin/|\?) 0 0% 0
refresh_pattern . 0 20% 4320
visible_hostname Daybreakersx
EOF

apt install stunnel
cat <<EOF > /etc/stunnel/stunnel.conf
cert = /etc/stunnel/stunnel.pem
client = no
socket = a:SO_REUSEADDR=1
socket = l:TCP_NODELAY=1
socket = r:TCP_NODELAY=1

[openvpn]
accept = 990
connect = 127.0.0.1:445

[dropbear]
accept = 143
connect = 127.0.0.1:444

[squid]
accept = 3129
connect = 127.0.0.1:3128
EOF

openssl genrsa -out key.pem 2048
openssl req -new -x509 -key key.pem -out cert.pem -days 1095
cat key.pem cert.pem >> /etc/stunnel/stunnel.pem
sed -i '6s/.*/ENABLED=1/' /etc/default/stunnel4
read -p "Press enter to continue"

cat <<EOF > /lib/systemd/system/port5000.service
[Unit]
Description=http server python service
After=network.target
StartLimitIntervalSec=0

[Service]
Restart=always
RestartSec=1
WorkingDirectory=/var/wg_config
User=root
ExecStart=-/usr/bin/python3 /var/wg_config/coba.py

[Install]
WantedBy=multi-user.target
EOF

systemctl enable port5000.service
service port5000 start
service port5000 status

cat <<EOF > /lib/systemd/system/bv7200.service
[Unit]
Description=badvpn 7200 service
After=network.target
StartLimitIntervalSec=0

[Service]
Restart=always
RestartSec=1
WorkingDirectory=/var/wg_config
User=root
ExecStart=-/var/wg_config/badvpn-udpgw --listen-addr 127.0.0.1:7200

[Install]
WantedBy=multi-user.target
EOF

systemctl enable bv7200.service
service bv7200 start
service bv7200 status

cat <<EOF > /lib/systemd/system/bv7300.service
[Unit]
Description=badvpn 7300 service
After=network.target
StartLimitIntervalSec=0

[Service]
Restart=always
RestartSec=1
WorkingDirectory=/var/wg_config
User=root
ExecStart=-/var/wg_config/badvpn-udpgw --listen-addr 127.0.0.1:7300

[Install]
WantedBy=multi-user.target
EOF

systemctl enable bv7300.service
service bv7300 start
service bv7300 status
/etc/init.d/apache2 stop
systemctl disable apache2.service
service openvpn-server@server restart
service openvpn-server@server-udp restart
read -p "Press enter to continue"

./pihole
pihole -a -p zxc

sed -i '36s/.*/server.port                 = 8099/' /etc/lighttpd/lighttpd.conf
sed -i '28s/.*/net.ipv4.ip_forward=1/' /etc/sysctl.conf
sed -i '33s/.*/net.ipv6.conf.all.forwarding=1/' /etc/sysctl.conf
sysctl -p
service lighttpd restart
service wg-quick@wg0 restart
service dropbear restart
service sslh restart
service stunnel4 restart
/etc/init.d/sslh restart
/etc/init.d/webmin restart
/etc/init.d/squid restart
CERT=$(cat /etc/openvpn/server/ca.crt)
mboh=$(dig @resolver1.opendns.com ANY myip.opendns.com +short)
cat <<EOF > /var/www/html/client.ovpn
client
dev tun
proto tcp
remote $mboh 443
resolv-retry infinite
nobind
auth-user-pass
auth-nocache
ignore-unknown-option block-outside-dns
block-outside-dns
verb 2
<ca>
$CERT
</ca>
EOF

cat <<EOF > /var/www/html/client-udp.ovpn
client
dev tun
proto udp
remote $mboh 443
resolv-retry infinite
nobind
auth-user-pass
auth-nocache
ignore-unknown-option block-outside-dns
block-outside-dns
verb 2
<ca>
$CERT
</ca>
EOF
mboh=$(dig @resolver1.opendns.com ANY myip.opendns.com +short)
jeneng=$(hostname)
cat <<EOF > $mboh.txt
-----------------------------------------
IP		: $mboh
Host		: $jeneng
------SSH--------------------------------

OpenSSH		: 22
Dropbear	: 443, 444
Dropbear-SSL	: 443, 143, 990, 3129
Squid		: 443, 80, 8080
Squid-SSL	: 3129

------Squid_OPEN-------------------------

------ShadwosockS------------------------

------OpenVPN----------------------------

Port		: 443, 445
http://$jeneng:8099/client.ovpn

------WireGuard_AdsBlock--(beta)---------
http://$jeneng:8099/client.conf
------BadVPN-----------------------------

port		: 7200	(recomended)
port		: 7300

-----------------------------------------
EOF
echo "/bin/false" >> /etc/shells
echo $mboh
cat $mboh.txt
read -p "Press enter to continue"
netstat -netulp |grep "8099\|5000\|10000\|8767\|22\|443\|444\|143\|990\|3129\|80\|8080\|445\|7200\|7300\|7676"
echo "pastikan sama dengan yang di atas"