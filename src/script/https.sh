#!/bin/bash

#############VARIABLES#################

dominio=$1

############FUNCIÓN##################

if [ -f '/etc/ssl/private/ssl-'$dominio'.key' ]
then
	echo 'Ya existe'
else

	sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/ssl-$dominio.key -out /etc/ssl/ssl-$dominio.crt
	sudo cp /home/david/isp/Plantillas/ssl-plantilla.conf /etc/apache2/sites-available/ssl-$dominio.conf
	sed -i 's/dominio/'$dominio'/g' /etc/apache2/sites-available/ssl-$dominio.conf

	sed -i 's/#//1' /etc/apache2/sites-available/$dominio.conf
	sudo a2ensite $dominio.conf
	sudo a2ensite ssl-$dominio.conf
	sudo systemctl reload apache2.service
fi
