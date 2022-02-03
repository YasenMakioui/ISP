<?php


require_once '../../../class/Conection.php';

$db = new Conection();

$nombre;
$apellido1;
$apellido2 = "";
$nombreUsuario;
$password;
$email;
$telefono;
$dni;
$fechaNacimiento = "";
$direccion = "";
$codigoPostal = "";
$poblacion = "";

/**
 * @param datos array ordenado con los datos
 */
function insertarDatos($obligatorios, $opcionales)
{
    global $db;

    $conn = $db->getConection();

    if (!$conn) {
        echo "mala conexion";
        die();
        return false;
    }

    $sql = "INSERT INTO usuario(nombre, dni, apellido1, apellido2, correo, nombreUsuario, password, telefono, fechaNacimiento, direccion, codigoPostal, idCiudad) ".
        "values('{$obligatorios['nombre']}', '{$obligatorios['dni']}', " .
        "'{$obligatorios['apellido1']}', '{$opcionales['apellido2']}', '{$obligatorios['email']}', " .
        "'{$obligatorios['nombreUsuario']}', '{$obligatorios['password']}', '{$obligatorios['telefono']}', " .
        "'{$opcionales['fechaNacimiento']}', '{$opcionales['direccion']}', '{$opcionales['codigoPostal']}', NULL);";

    if (!$conn->query($sql)) {
        
        return false;
    }
        
    header('Location: /?vista=alta.php&obligatorio=2');
    die();
}

function comprobarOpcionales()
{
    global $apellido2, $fechaNacimiento, $direccion, $codigoPostal, $poblacion;

    if (isset($_POST['apellido2'])) {
        $apellido2 = $_POST['apellido2'];
    }

    if (isset($_POST['fechaNacimiento'])) {
        $fechaNacimiento = $_POST['fechaNacimiento'];
    }

    if (isset($_POST['direccion'])) {
        $direccion = $_POST['direccion'];
    }

    if (isset($_POST['codigoPostal'])) {
        $codigoPostal = $_POST['codigoPostal'];
    }

    if (isset($_POST['poblacion'])) {
        $poblacion = $_POST['poblacion'];
    }

    return array(
        'apellido2' => $apellido2,
        'fechaNacimiento' => $fechaNacimiento,
        'direccion' => $direccion,
        'codigoPostal' => $codigoPostal,
        'poblacion' => $poblacion
    );
}


function comprobarObligatorios()
{
    global $nombre, $apellido1, $nombreUsuario, $password, $email, $telefono, $dni;

    if (
        isset($_POST['nombre']) and
        isset($_POST['apellido1']) and
        isset($_POST['nombreUsuario']) and
        isset($_POST['password']) and
        isset($_POST['email']) and
        isset($_POST['telefono']) and
        isset($_POST['dni'])

    ) {

        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $nombreUsuario = $_POST['nombreUsuario'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $dni = $_POST['dni'];

        if (
            !(empty($nombre) or
                empty($apellido1) or
                empty($nombreUsuario) or
                empty($password) or
                empty($email) or
                empty($telefono) or
                empty($dni)
            )
        ) {
            $opcionales = comprobarOpcionales();
            $obligatorios = array(
                'nombre' => $nombre,
                'apellido1' => $apellido1,
                'nombreUsuario' => $nombreUsuario,
                'password' => $password,
                'email' => $email,
                'telefono' => $telefono,
                'dni' => $dni
            );

            insertarDatos($obligatorios, $opcionales);

            header('Location: /?vista=alta.php&obligatorio=1');
        } else {
            header('Location: /?vista=alta.php&obligatorio=0');
        }
    } else {
        header('Location: /?vista=alta.php&obligatorio=0');
    }
}


//ejecutar script

comprobarObligatorios();
