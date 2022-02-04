<?php

/**
 * @author Yasen El Makioui
 */
?>
<div class="w-100 form-wrapper d-flex justify-content-center align-items-center">
    <form action="./src/script/php/cliente/altaCliente.php" method="POST" class="w-75 d-flex justify-content-center align-items-center">
        <div class="p-5 border rounded shadow">
            <h1 class="text-center">Alta Cliente</h1>
            <label for="nombre" class="d-block">Nombre:</label>
            <input type="text" name="nombre" class="mb-2 p-1">
            <label for="apellido1" class="d-block">Apellido 1:</label>
            <input type="text" name="apellido1" class="mb-2 p-1">
            <label for="apellido2" class="d-block">Apellido 2:</label>
            <input type="text" name="apellido2" class="mb-2 p-1">
            <label for="email" class="d-block">Email:</label>
            <input type="text" name="email" class="mb-2 p-1">
            <label for="nombreUsuario" class="d-block">Usuario:</label>
            <input type="text" name="nombreUsuario" class="mb-2 p-1">
            <label for="password" class="d-block">Password:</label>
            <input type="password" name="password" class="mb-2 p-1">
            <label for="telefono" class="d-block">Teléfono:</label>
            <input type="text" name="telefono" class="mb-2 p-1">
            <label for="dni" class="d-block">DNI:</label>
            <input type="text" name="dni" class="mb-2 p-1">
            <label for="fechaNacimiento" class="d-block">Fecha de Nacimiento:</label>
            <input type="text" name="fechaNacimiento" class="mb-2 p-1">
            <label for="direccion" class="d-block">Dirección:</label>
            <input type="text" name="direccion" class="mb-2 p-1">
            <label for="codigoPostal" class="d-block">Código Postal</label>
            <input type="text" name="codigoPostal" class="mb-2 p-1">
            <label for="poblacion" class="d-block">Población:</label>
            <select name="poblacion" class="d-block mb-2 p-1">
                <?php
                $sql = "SELECT idCiudad, nombreCiudad FROM ciudad;";
                //realizar foreach con consulta de poblaciones
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) :
                ?>
                    <option value="<?= $row['idCiudad'] ?>"><?= $row['nombreCiudad'] ?></option>
                <?php
                endwhile;
                ?>
            </select>
            <div class="w-100 d-flex justify-content-end">
                <button class="btn btn-primary ">Enviar</button>
            </div>

        </div>

    </form>
</div>