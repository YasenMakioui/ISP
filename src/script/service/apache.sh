#!/bin/bash

#VARIABLES#

dominio=$1



######################################################

###COMPRUEBA SI EXISTE EL FICHERO###########
if [ -f '/etc/apache2/sites-enabled/'$dominio'.conf' ]
then
	echo "El dominio $dominio ya existe"
else
#####CREARÁ EL DOMINIO CON UNA PÁGINA DE INICIO######
	sudo cp /home/david/isp/Plantillas/plantilla.conf /etc/apache2/sites-available/$dominio.conf
	sed -i 's/dominio/'$dominio'/g' /etc/apache2/sites-available/$dominio.conf
	sed -i 's/html/'$dominio'/g' /etc/apache2/sites-available/$dominio.conf
	sudo mkdir /var/www/$dominio
	sudo touch index.html /var/www/$dominio
	echo "<html><head><title>HOME</title></head><body><h1>Prueba Script</h1></body></html>" > /var/www/$dominio/index.html
	sudo a2ensite $dominio.conf
	sudo systemctl restart apache2.service
fi
