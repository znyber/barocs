#!/bin/bash
apt install python3-pip git net-tools rsync -y
apt install apache2 apache2-bin apache2-data apache2-utils libapr1 libaprutil1 libaprutil1-dbd-sqlite3 libaprutil1-ldap libconfig9 libfile-copy-recursive-perl liblua5.2-0 ssl-cert update-inetd
mkdir -p /var/www/html
wget https://raw.githubusercontent.com/znyber/distrack/master/sentinel
chmod a+x sentinel
#sentinel harus di download agar bisa clone github
./sentinel
mboh=$(ip addr | grep 'inet' | grep -v inet6 | grep -vE '127\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | grep -oE '[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | head -1)
cd /var 
git clone git@github.com:znyber/wg_config.git /var/wg_config
chmod -R 777 /var/wg_config 
cd /var/wg_config
rsync -avz -P /var/wg_config/script/ngising /usr/bin/
pwd
pip3 install flask
sleep 2
/var/wg_config/user.sh
sleep 2
echo "enter aja nanti juga kesetting manual di bawah"
/var/wg_config/openvpn-install.sh
sleep 2
mboh=$(ip addr | grep 'inet' | grep -v inet6 | grep -vE '127\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | grep -oE '[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | head -1)

cat <<EOF > ~/.bash_profile
source ~/.bashrc
/usr/bin/ngising && exit
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

echo "deb http://download.webmin.com/download/repository sarge contrib" >> /etc/apt/sources.list
echo "deb http://webmin.mirror.somersettechsolutions.co.uk/repository sarge contrib" >> /etc/apt/sources.list
wget http://www.webmin.com/jcameron-key.asc
apt-key add jcameron-key.asc
apt update && apt upgrade
apt install -y dropbear 
apt install -y stunnel 
apt install -y squid 
apt install -y python3-pip 
apt install -y python3 
apt install -y simple-obfs 
apt install -y shadowsocks-libev
apt install -y webmin
apt install -y libxml-parser-perl
apt install -y openssl
apt install -y apache2-utils
apt install -y pptpd

cat <<EOF > /etc/ppp/pptpd-options
name pptpd
refuse-pap
refuse-chap
refuse-mschap
require-mschap-v2
require-mppe-128
ms-dns 10.7.0.1
ms-dns 10.8.0.1
proxyarp
nodefaultroute
lock
nobsdcomp
novj
novjccomp
nologfd
EOF

cat <<EOF > /etc/ppp/chap-secrets
znyber pptpd zxc *
EOF
systemctl enable pptpd
echo "localip 172.76.0.1" >> /etc/pptpd.conf
echo "remoteip 172.76.0.2-254" >> /etc/pptpd.conf
sed -i '10s/.*/ssl=0/' /etc/webmin/miniserv.conf
mboh=$(ip addr | grep 'inet' | grep -v inet6 | grep -vE '127\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | grep -oE '[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | head -1)
cat <<EOF > /etc/default/znyber
RUN=yes
DAEMON=/usr/sbin/znyber
DAEMON_OPTS="--user znyber --listen  $mboh:443 --ssh 0.0.0.0:444 --openvpn 0.0.0.0:445 --ssl 0.0.0.0:143 --ssl 0.0.0.0:3129 --ssl 0.0.0.0:990 --http 127.0.0.1:3128 --pidfile /var/run/znyber/znyber.pid"

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

apt install -y stunnel
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

cat <<EOF > /etc/stunnel/stunnel.pem
-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAz/IrnCgwE3McZQqFjSdoP2VGW8dGNbgoifc2jgAJOdTkkuoX
qFiV/91kUKTsjnHPo8nBmMQ/ZshgS6d0v2G4Z+ar3j7LBJAXUegFYafi6aiY0gIA
6KVpA0NVK4WYptjJMNke4z00usZXoZROCHxewmXUNVIabtAGtFV7acBh6qAHAlSC
i3kfphWimy/joB1rvacDr8AyUSMurO/Odb8z5maodL1KhBls41TWBa9FNqF8Kk6S
sjdB1nTUgMPZgEYWj/mK4mCpeICdADKj6qTTl8huPax5MI4WHFKPWPD2sYJd2Sh3
UF6ql7wa1Towez5FN9MXZ40HLg72g/ubiCGAlwIDAQABAoIBADyhyw90NFhndv8L
K1e2BtJ9UB+QoislsERSHckXv5jqN1+S/CTs94esYQSWohcCnl2OhXFqv2XTxSgq
AoOPFbrN6o0Z2A5TiUkrku4fiq1AqJaLWQJ8wHrgFiRjhtgXW8pvdG8juI1BKeoG
GR6mTOb31AFcGDL5WwsX5a03GBXV3nh1e1bWI2Ble8hGHMR58jyIO4YOe/BaKWFl
9MMdeZ3IqS/8A7b+wFWi7zfwpSh2NS/QuxxmwSBcFbWb4uQ9la9gnabPCTS9Uujp
tkkBeLSy4L62lP6Fal8RNtGe86Afq6G8vHJ2lGIOs5HWJ27n981+bwRfC75BpcVm
dHX/dokCgYEA9wFzMOPQ9WtyGpcSWaXdt2+mrNI3qS+rnjICRBxCB2mg1z/nJg7v
QqC1YAIglgC6zclBP06aDk3IaKIVg4t7bvaf6joi5OYKOILzVo9rhnfRvI1FRUMj
R6k0PGuZWr9eyQNwnx3+jPpSI7EPJtIviRXzkeF6uo7YayO5gXJe4eUCgYEA14Sc
n2tTF50be+91eab9y7dH3T69mb63ubHZspRMQI1oajdhElF4JMMpb9byn5oQdQpV
4kqTw0sxUSWz+BipdVWqUPeYSj+puHGqAVi1X4eiRlUWAjJuo643qKtFquHfC+Z/
21DJMGbw+GFGVjxgijI2zve+I459FBAuraiM4MsCgYBF6QYmX0SEQd3wwrNx5i1D
vvkozvLsEs77HmJfzrOtj2rzoWWV8wIrFHthahi4/AnjNsQd2+xkggVoAAAg1Dii
ZnFKhRvdN3LLHd0rsboYPA+D02Q4v1Db9nsPYtDry2BTeoLEtmOWmT7oVTPZpAHK
RglDT9NBvC5q3Jijl7BdNQKBgEWDHklFAo3xPHYi7A8Kz30vZlxz6g92tieMt5yj
vFxtv6nSptqTsF6bG/hYqfTUak51wPG2ACbTT9rOgFebDL0tnjtzQIliM0msT5sT
k5x2UN7CftDCl3DvtkAOze+p3pkmBUMlsV6NNVfHeDpESxcHzym+OnOZd7pK5eNZ
I+c1AoGAM/zBM2L95F6BtUNVKcjWsWh8aXW6o/BeAg77GEq5gKfYo1HjPEiPyubn
O2iRbiPNPf6nHUW3bCj9dhfjKZaIxUu5lOhymqQL7vbTFyTCj5KkW7U7by1IKMay
2dXpBDq+ouMdGqQ9MwUoxtkfNo5I7h2DOUj+NASTfBTavfaaV3Y=
-----END RSA PRIVATE KEY-----
-----BEGIN CERTIFICATE-----
MIID2TCCAsGgAwIBAgIUZCqSVAjF1/xWqHAtbuRf2ZIf2uwwDQYJKoZIhvcNAQEL
BQAwfDELMAkGA1UEBhMCSUQxFDASBgNVBAgMC2phdmEtY2VudGVyMRMwEQYDVQQH
DApwdXJ3b2tlcnRvMSEwHwYDVQQKDBhJbnRlcm5ldCBXaWRnaXRzIFB0eSBMdGQx
HzAdBgkqhkiG9w0BCQEWEHVzbWFuQHpueWJlci5jb20wHhcNMjAwNTAyMTQyMjAz
WhcNMjMwNTAyMTQyMjAzWjB8MQswCQYDVQQGEwJJRDEUMBIGA1UECAwLamF2YS1j
ZW50ZXIxEzARBgNVBAcMCnB1cndva2VydG8xITAfBgNVBAoMGEludGVybmV0IFdp
ZGdpdHMgUHR5IEx0ZDEfMB0GCSqGSIb3DQEJARYQdXNtYW5Aem55YmVyLmNvbTCC
ASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAM/yK5woMBNzHGUKhY0naD9l
RlvHRjW4KIn3No4ACTnU5JLqF6hYlf/dZFCk7I5xz6PJwZjEP2bIYEundL9huGfm
q94+ywSQF1HoBWGn4umomNICAOilaQNDVSuFmKbYyTDZHuM9NLrGV6GUTgh8XsJl
1DVSGm7QBrRVe2nAYeqgBwJUgot5H6YVopsv46Ada72nA6/AMlEjLqzvznW/M+Zm
qHS9SoQZbONU1gWvRTahfCpOkrI3QdZ01IDD2YBGFo/5iuJgqXiAnQAyo+qk05fI
bj2seTCOFhxSj1jw9rGCXdkod1Beqpe8GtU6MHs+RTfTF2eNBy4O9oP7m4ghgJcC
AwEAAaNTMFEwHQYDVR0OBBYEFDv8q1oThLPw77PIct0KQcu2eHGvMB8GA1UdIwQY
MBaAFDv8q1oThLPw77PIct0KQcu2eHGvMA8GA1UdEwEB/wQFMAMBAf8wDQYJKoZI
hvcNAQELBQADggEBAFlrojs7TBahQPUzRYRkfIa7XO16VwlNndDVD1OaszBxNByO
hHsO2/byEnnG277Ebmb31kufccG9itAoieWkWc5CpFNFQjQJtH5G9ochg0JkdQhB
JDqNYnCYhT3swFOV6BjNuIjj9j3/neOwyqekTA6Cy+KczOvDfTPAaHZGCE9tXMrw
WNhPYjj7IM5AbZiEuOeCZb0Ymg/rVm7QNdGGdJ2MfnCGPxlp+UVj/nemDXCQoC1R
4ZqzF+wnSDEVGSfNe27ee4PyLZTXKbvZAkwrAtQxPKWU83FZ/wkJwO0MW1sKBVAt
lLG3Pg5I1Kam30B0NW/U5j/FYO4QCY9dDKOCe6M=
-----END CERTIFICATE-----
EOF
sed -i '6s/.*/ENABLED=1/' /etc/default/stunnel4
sleep 2

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
#read -p "Press enter to continue"

/var/wg_config/pihole
pihole -a -p zxc

sed -i '36s/.*/server.port                 = 8099/' /etc/lighttpd/lighttpd.conf
sed -i '28s/.*/net.ipv4.ip_forward=1/' /etc/sysctl.conf
sed -i '33s/.*/net.ipv6.conf.all.forwarding=1/' /etc/sysctl.conf
sysctl -p
service lighttpd restart
service wg-quick@wg0 restart
service dropbear restart
service stunnel4 restart
/etc/init.d/webmin restart
/etc/init.d/squid restart
CERT=$(cat /etc/openvpn/server/ca.crt)
mboh=$(ip addr | grep 'inet' | grep -v inet6 | grep -vE '127\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | grep -oE '[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | head -1)
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
mboh=$(ip addr | grep 'inet' | grep -v inet6 | grep -vE '127\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | grep -oE '[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}' | head -1)
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
Port		: 443, 445
http://$jeneng:8099/client.ovpn

------WireGuard_AdsBlock--(beta)---------
http://$jeneng:8099/client.conf
------BadVPN-----------------------------

port		: 7200	(recomended)
port		: 7300

-----------------------------------------
EOF

cat <<EOF > /etc/pam.d/common-password
password    [success=1 default=ignore]  pam_unix.so obscure sha512 minlen=1
password        requisite                       pam_deny.so
password        required                        pam_permit.so
EOF
service lighttpd restart
service wg-quick@wg0 restart
service dropbear restart
service stunnel4 restart
systemctl start pptpd
/etc/init.d/webmin restart
/etc/init.d/squid restart
echo "/bin/false" >> /etc/shells
echo $mboh
cat $mboh.txt
ufw disable
echo "wait..."
sleep 20
service znyber restart
sleep 2
netstat -netulp |grep "8099\|5000\|10000\|8767\|22\|443\|444\|143\|990\|3129\|80\|8080\|445\|7200\|7300"
mkdir -p /var/dumpWG
echo "pastikan sama dengan yang di atas"