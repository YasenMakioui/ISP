<div class="w-100 container-sm">
    <div class="text-center">
        <h1>Contacta con nosotros!!</h1>
    </div>
    <form class="mt-5 d-flex flex-column align-items-center " method="post" action="/src/script/php/contacto.php">
        <div class="w-25 d-flex flex-column">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
            <label for="apellidos" class="mt-3">Apellidos:</label>
            <input type="text" name="apellidos">
            <label for="telefono" class="mt-3">Telefono:</label>
            <input type="text" name="telefono">
            <label for="email" class="mt-3">Email:</label>
            <input type="text" name="email">
            <label for="observaciones" class="mt-3">Observaciones:</label>
            <textarea cols="3" rows="3" name="observaciones"></textarea>
            <div class="d-flex justify-content-end mt-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
</div>
<div style="height: 32vh;">

</div>