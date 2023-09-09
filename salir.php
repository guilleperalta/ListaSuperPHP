<?php
session_start();
session_destroy();
setcookie("usuario", '', time() + 3600, "/");
setcookie("usuario", '', time() - 10, "/");
header ('Location:login.php');
?>