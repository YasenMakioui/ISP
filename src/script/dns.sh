#!/bin/bash


#######VARIABLES##########

dominio=$1
ip=$(hostname -I)


#########CODIGO##########

if [ -f '/etc/bind/db.'$dominio'' ]
then
	echo "El archivo ya existe"
else
	sudo cp /etc/bind/db.local /etc/bind/db.$dominio
	sudo cp /home/david/isp/Plantillas/zone_plantilla.txt /home/david/isp/Plantillas/zone_$dominio.txt
	sudo sed -i 's/dominio/'$dominio'/g' /home/david/isp/Plantillas/zone_$dominio.txt
	sudo cat /home/david/isp/Plantillas/zone_$dominio.txt >> /etc/bind/named.conf.local
	sudo sed -i 's/localhost/'$dominio'/g' /etc/bind/db.$dominio
	sudo sed -i 's/127.0.0.1/'$2'/g' /etc/bind/db.$dominio
	sudo systemctl restart bind9.service
fi
