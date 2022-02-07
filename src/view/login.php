<?php

/**
 * @author Younes Boudouch
 */

$noCoincide = "";

//tratamiento de errores 
if (isset($_GET['obligatorio'])) {
   if ($_GET['obligatorio'] == '0') {
      $noCoincide="<span>Las credenciales no coinciden</span>";
   }
}



//Si el usuario esta loggeado, lo redirigimos al inicio
if (isset($_SESSION['user'])) {
   header('Location: /?vista=inicio.php');
}

?>

<div class="w-100 form-wrapper d-flex justify-content-center align-items-center">

   <form class="w-50 d-flex justify-content-center align-items-center" id="login" method="post" action="./src/script/php/cliente/loginCliente.php">
      <div class="p-5 border rounded shadow">
         <h1 class="text-center">Login</h1>
         <label class="d-block" for="username" >Usuario: </label>
         <input class="mb-2 p-1" type="text" name="username" id="username">
         <label class="d-block" for="pass">Password: </label>
         <input class="mb-2 p-1" type="password" name="password" id="password"> 
      <div>
      <div class="w-100 d-flex justify-content-end">
                <button class="btn btn-primary " type="submit">Enviar</button>
      </div>
   </form>
   <?=$noCoincide?>
</div>



