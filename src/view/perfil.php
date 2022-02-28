<?php

/**
 * @author Yasen El Makioui
 */

//sentencia para recuperar la informacion del usuario
$sql = "SELECT * FROM usuario WHERE idUsuario = {$_SESSION['idUsuario']}";

$usuario = $conn->query($sql)->fetch_assoc();

$statusMsg = "";

//tratamiento de errores 
if (isset($_GET['obligatorio'])){

    if ($_GET['obligatorio'] == 0 ) {
        $statusMsg = "El perfil se ha actualizado correctamente";
    }elseif ($_GET['obligatorio'] == 1 ) {
        $statusMsg = "El perfil no se ha actualizado correctamente";
    }elseif ($_GET['obligatorio'] == 2 ) {
        $statusMsg = "Introduzca la contraseña para actualizar su perfil";
    }
    
};
 
//si el usuario no esta loggeado lo mandamos al inicio
if (!isset($_SESSION['idUsuario'])) {
    header('Location: /?vista=inicio.php');
}

?>
<div class="w-100 form-wrapper d-flex justify-content-center align-items-center">
    <form action="./src/script/php/cliente/modificacionCliente.php" method="POST" class="w-75 d-flex justify-content-center align-items-center">
        <div class="p-5 border rounded shadow">
            <h1 class="text-center">Perfil</h1>
            <label for="nombre" class="d-block">Nombre:</label>
            <input type="text" name="nombre" class="mb-2 p-1" value="<?= $usuario['nombre'] ?>">
            <label for="apellido1" class="d-block">Apellido 1:</label>
            <input type="text" name="apellido1" class="mb-2 p-1" value="<?= $usuario['apellido1'] ?>">
            <label for="apellido2" class="d-block">Apellido 2:</label>
            <input type="text" name="apellido2" class="mb-2 p-1" value="<?= $usuario['apellido2'] ?>">
            <label for="email" class="d-block">Email:</label>
            <input type="text" name="email" class="mb-2 p-1" value="<?= $usuario['correo'] ?>">
            <label for="nombreUsuario" class="d-block">Usuario:</label>
            <input type="text" name="nombreUsuario" class="mb-2 p-1" value="<?= $usuario['nombreUsuario'] ?>">
            <label for="password" class="d-block">Password:</label>
            <input type="password" name="password" class="mb-2 p-1">
            <label for="newPassword" class="d-block">Nueva contraseña:</label>
            <input type="password" name="newPassword" class="mb-2 p-1">
            <label for="telefono" class="d-block">Teléfono:</label>
            <input type="text" name="telefono" class="mb-2 p-1" value="<?= $usuario['telefono'] ?>">
            <label for="dni" class="d-block">DNI:</label>
            <input type="text" name="dni" class="mb-2 p-1" value="<?= $usuario['dni'] ?>">
            <label for="fechaNacimiento" class="d-block">Fecha de Nacimiento:</label>
            <input type="text" name="fechaNacimiento" class="mb-2 p-1" value="<?= $usuario['fechaNacimiento'] ?>">
            <label for="direccion" class="d-block">Dirección:</label>
            <input type="text" name="direccion" class="mb-2 p-1" value="<?= $usuario['direccion'] ?>">
            <label for="codigoPostal" class="d-block">Código Postal</label>
            <input type="text" name="codigoPostal" class="mb-2 p-1" value="<?= $usuario['codigoPostal'] ?>">
            <label for="poblacion" class="d-block">Población:</label>
            <select name="poblacion" class="d-block mb-2 p-1">
                <?php
                //Sentencia para recuperar los paises
                $sql = "SELECT idCiudad, nombreCiudad FROM ciudad;";
                //realizar foreach con consulta de poblaciones
                $selected = "";
                $result = $conn->query($sql);

                //bucle para meter las ciudades en options
                while ($row = $result->fetch_assoc()) :
                    
                    if($row['idCiudad'] === $usuario['idCiudad']) {
                       $selected = "selected";
                    } else {
                        $selected = "";
                    }
                ?>
                    <option value="<?=$row['idCiudad'] ?>" <?=$selected?>> <?=$row['nombreCiudad'] ?></option>
                <?php
                endwhile;
                ?>
            </select>
            <div class="w-100 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary ">Actualizar</button>
                <a href="src/script/php/cliente/bajaCliente.php" class="btn btn-primary ">Eliminar</a>
            </div>

        </div>

    </form>
    <?=$statusMsg?>
</div>