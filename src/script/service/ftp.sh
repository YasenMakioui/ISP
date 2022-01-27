#!/bin/bash

##############VARIABLES##############

usuario = $1


#############FUNCIÓN#################

if [ -u '/home/'$usuario'/ftp' ]
then
    echo "El usuario ya existe"
else

#####CREAMOS AL USUARIO###########
    sudo adduser $usuario
    sudo mkdir /home/$usuario/ftp
    sudo chown nobody:nogroup /home/$usuario/ftp
    sudo chmod a-w /home/$usuario/ftp
    sudo mkdir /home/$usuario/ftp/files
    sudo chown $usuario:$usuario /home/$usuario/ftp/files
    echo "vsftpd test file" | sudo tee /home/$usuario/ftp/files/test.txt

##########AÑADIMOS AL USUARIO AL ARCHIVO VSFTPD########
    echo "$usuario" | sudo tee -a /etc/vsftpd.userlist
    sudo systemctl restart vsftpd