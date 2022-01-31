<?php

/**
 * @author Younes Boudouch
 */
?>

<div class="w-100 form-wrapper d-flex justify-content-center align-items-center">

   <form class="w-50 d-flex justify-content-center align-items-center" id="login" method="post" action="./src/script/php/cliente/loginCliente.php">
      <div class="p-5 border rounded shadow">
         <h1 class="text-center">Login</h1>
         <label class="d-block" for="username" >Usuario: </label>
         <input class="mb-2 p-1" type="text" name="username" id="username" >
         <label class="d-block" for="pass">Password: </label>
         <input class="mb-2 p-1" type="pass" name="password" id="password">
      <div>
      <div class="w-100 d-flex justify-content-end">
                <button class="btn btn-primary ">Enviar</button>
      </div>
   </form>
</div>



