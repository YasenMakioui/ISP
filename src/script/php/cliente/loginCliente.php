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

// function check($datosform){
//     $datosform = trim($datosform);
//     $datosform = stripcslashes($datosform);
//     $datosform = htmlspecialchars($datosform);
//     return $datosform;
// }

//miras si estan setteados, isset y luego miras si estan empty, y luego nada mas

function comprobarUsuario($usuario)
{
    global $conn;
    
    $sql = "SELECT * from usuario WHERE nombreUsuario = '{$usuario}';";

    $result = $conn->query($sql);
    
    
    if (!$result) { header('Location: /?vista=login.php&obligatorio=1'); }
    
    
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();    
        
        if ($_POST['username'] == $row['nombreUsuario']) {
            $plainPassword = $_POST['password'];
            
            $verification = password_verify($plainPassword, $row['password']);
            if ($verification) {
                 /**
                  *  
                  */ 
                $_SESSION['idUsuario'] = $row['idUsuario'];
                header('Location: /?vista=inicio.php');
            } else {
                header('Location: /?vista=login.php&obligatorio=0');
            }
        }
    } else {
        header('Location: /?vista=login.php&obligatorio=0');
    }
}




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
