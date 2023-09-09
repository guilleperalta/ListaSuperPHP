<?php
    require('header.php');
?>
<div class="fullview">
    <h5>Completa los datos</h5>
    <div class="login">
        <input class="usuario"  id="usuario" type="text" name="nombre" placeholder="usuario">
        <input class="contraseña"  id="contraseña" type="password" name="pass" placeholder="contraseña">
        <input id="crearusuario" class="btnenviar" value="crear usuario">
        <div class="atras">
            <a href="login.php"><i class="fas fa-arrow-left fa-3x"></i></a>
        </div>
    </div>
</div>
<?php
    require('footer.php');
?>