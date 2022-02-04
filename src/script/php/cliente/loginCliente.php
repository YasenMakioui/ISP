<?php


/**
 * @author Younes Boudouch
 */

require_once '../../../class/Conection.php';

$db = new Conection();
$conn = $db->getConection();

$username;
$password;




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
    
    $sql = "SELECT nombreUsuario,password from usuario WHERE nombreUsuario = '{$usuario}';";

    $result = $conn->query($sql);
    
    
    if (!$result) { return; }
    
    
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();    
        
        if ($_POST['username'] == $row['nombreUsuario']) {
            $plainPassword = $_POST['password'];
            
            $verification = password_verify($plainPassword, $row['password']);
            if ($verification) {
                /**
                 * START SESSION
                 */
                
            } else {
                header('Location: /?vista=login.php&obligatorio=1');
            }
        }
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
            header('Location: /?vista=login.php&obligatorio=1');
        } else {
            comprobarUsuario($username);

        }
    } else {
        header('Location: /?vista=login.php&obligatorio=1');
    }

    
}

validarObligatorios();
