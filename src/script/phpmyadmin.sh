#!/bin/bash

#####PARAMETROS DE CONEXIÓN CON BBDD MYSQL#########
SQL_HOST = localhost
SQL_USER = "david"
SQL_PASSWORD = "terminal"
SQL_DATABASE = "Practiques_IAW"

###########VARIABLES#####################

usuario = $1
bd = $2

###########CONEXIÓN###############

SQL_ARGS = "-h $SQL_HOST -u $SQL_USER -p $SQL_PASSWORD -D $SQL_DATABASE -s -e"

###########SENTENCIAS SQL Y LAS LANZAMOS###############

mysql $SQL_ARGS "CREATE DATABASE $bd;"
mysql $SQL_ARGS "CREATE USER '$usuario'@'%' IDENTIFIED WITH mysql_native_password BY '135_Manacor';"
mysql $SQL_ARGS "GRANT ALL PRIVILEGES ON $bd.* TO '$usuario'@'%' WITH GRANT OPTION;"

############AÑADIR EL USUARIO EN LA PROTECCIÓN DE LA INSTANCIA##############

sudo htpasswd /etc/phpmyadmin/.htpasswd $usuario

################COMENTARIO FINAL######################

echo "Su contraseña por defecto es '135_Manacor', por favor ingrese una própia o pongase en contacto con su administrador"