<?php
session_start();

/**
 * @author Younes Boudouch
 */

require_once '../../../class/Conection.php';

$db = new Conection();
$conn = $db->getConection();

$username;
$password;


/**
 * CODIGOS:
 * 
 * 0 -> no coinciden las credenciales
 * 1 -> la base de datos no esta funcionando
 */



//comprobamos el usuario
function comprobarUsuario($usuario) {
    global $conn;


    //recuperamos los usuarios que coinciden
    $sql = "SELECT * from usuario WHERE nombreUsuario = '{$usuario}';";

    $result = $conn->query($sql);

    //si no se encuentra el usuario redirigimos
    if ($result) {
        header('Location: /?vista=login.php&obligatorio=0');

            //
            $row = $result->fetch_assoc();
            //comprobamos que coincide el usuario
            if ($_POST['username'] == $row['nombreUsuario']) {
                //recogemos la contraseña
                $plainPassword = $_POST['password'];

                //verificamos la contraseña
                $verification = password_verify($plainPassword, $row['password']);

                //si esta verificado asignamos la ID, si no redirigimos
                if ($verification) {
                    $_SESSION['idUsuario'] = $row['idUsuario'];
                    header('Location: /?vista=inicio.php');
                } else {
                    header('Location: /?vista=login.php&obligatorio=0');
                }
            } else {
                header('Location: /?vista=login.php&obligatorio=0');
            }

    } else {
        header('Location: /?vista=login.php&obligatorio=0');
    }

}

//funcion para validar los campos, si no estan rellenados redirigimos con el codigo correspondiente
function validarObligatorios()
{
    global $username, $password;

    if (
        isset($_POST['username']) and
        isset($_POST['password'])
    ) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) or empty($password)) {
            header('Location: /?vista=login.php&obligatorio=0');
        } else {
            comprobarUsuario($username);

        }
    } else {
        header('Location: /?vista=login.php&obligatorio=0');
    }

    
}

validarObligatorios();
