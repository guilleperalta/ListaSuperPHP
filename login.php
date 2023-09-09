<?php
require('header.php');

session_start();

?>
<div class="fullview">
    <div class="logo">
        <img src="img/logo.png" alt="logo lista super">
    </div>
    <form class="login" action="funciones/loguear.php" method="post">
        <div>
            <i class="fas fa-user fa-2x cust"></i>
            <input class="usuario" id="usuario" type="text" name="nombre" placeholder="usuario">
        </div>
        <div class="contenedor-pass">
            <i class="fas fa-key fa-2x cust"></i>
            <input class="contraseña" id="contraseña" type="password" name="pass" placeholder="contraseña">
            <i class="fa-solid fa-eye" onclick="verOcultar()"></i>
            <i class="fa-solid fa-eye-slash" onclick="verOcultar()"></i>
        </div>
        <div>
            <i class="fas fa-lock-open-alt fa-2x cust"></i>
            <input class="btnenviar" type="submit" value="acceder">
        </div>
        <div class="cookie">
            <input id="checkbox" type="checkbox" name="cookie">Recordar session
        </div>
    </form>
    <div class="create">
        <i class="fas fa-user-plus fa-2x"></i>
        <h4><a href="create.php">crear cuenta</a></h4>
    </div>
</div>
<?php
    require('footer.php');
?>