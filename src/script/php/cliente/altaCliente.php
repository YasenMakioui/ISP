<?php

/**
 * CODIGOS:
 * 
 * 0 -> si no se han rellenado o no estan settados los campos obligatorios
 * 1 -> si no se pudieron insertar los datos en mysql
 * 2 -> si todo ha ido bien
 */

require_once '../../../class/Conection.php';
//instanciamos el objecto para la conexion
$db = new Conection();

//declarar variables, si son obligatorias simplemente declaramos, 
//si son opcionales estaran vacios por defecto
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
 * Inserta datos en la base de datos
 * @param obligatorio array asociativo con datos obligatorios
 * @param opcionales array asociativo con datos opcionales
 * @return none en caso de que falle, vuelve
 */
function insertarDatos($obligatorios, $opcionales)
{
    //asignamos la conexion
    global $db;

    $conn = $db->getConection();

    //si no se pudo conectar matamos el proceso
    if (!$conn) {
        echo "mala conexion";
        die();
        return;
    }
    
    //insert con los datos que recuperamos de la variable obligatorios y opcioales
    $sql = "INSERT INTO usuario ".
        "values(NULL, '{$obligatorios['nombre']}', '{$obligatorios['dni']}', " .
        "'{$obligatorios['apellido1']}', '{$opcionales['apellido2']}', '{$obligatorios['email']}', " .
        "'{$obligatorios['nombreUsuario']}', '{$obligatorios['password']}', '{$obligatorios['telefono']}', " .
        "'{$opcionales['fechaNacimiento']}', '{$opcionales['direccion']}', '{$opcionales['codigoPostal']}', '{$opcionales['poblacion']}');";

    //si no se pudo insertar volvemos
    if (!$conn->query($sql)) {
        
        return;
    }
        
    //si todo ha ido bien, redirigimos con el codigo correspondiente
    header('Location: /?vista=alta.php&obligatorio=2');
    die();
}

/**
 * Asigna, si existen, los datos opcionales
 * @return array devuelve los datos opcionales
 */
function comprobarOpcionales()
{
    global $apellido2, $fechaNacimiento, $direccion, $codigoPostal, $poblacion;

    //miramos si existen los registros en la superglobal y asignamos el valor si estan asignados
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

/**
 * valida los campos obligatorios
 */
function comprobarObligatorios()
{
    global $nombre, $apellido1, $nombreUsuario, $password, $email, $telefono, $dni;

    //miramos si estan setteados
    if (
        isset($_POST['nombre']) and
        isset($_POST['apellido1']) and
        isset($_POST['nombreUsuario']) and
        isset($_POST['password']) and
        isset($_POST['email']) and
        isset($_POST['telefono']) and
        isset($_POST['dni'])

    ) {
        //asignamos las variables
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $nombreUsuario = $_POST['nombreUsuario'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $dni = $_POST['dni'];

        //comprobamos que no esten vacios
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
            //recibimos los campos opcionales
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

            //llamamos a la funcion y le pasamos los arrays con los datos
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


