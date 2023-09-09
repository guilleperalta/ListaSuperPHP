<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Celular = $_POST['Celular'];
$Asunto = $_POST['Asunto'];
$Mensaje = $_POST['Mensaje'];
$contenido = "Enviado desde la web guilleperalta.com 
                    Nombre= ".$Nombre."
                    Email= ".$Email."
                    Celular= ".$Celular."
                    Asunto= ".$Asunto."
                    Mensaje= ".$Mensaje;
$destinatario = "guille.peralta.dev@gmail.com";
$origen = "info@guilleperalta.com";
$asuntoweb = "Correo desde la web";
$headers = "Desde:" . $origen;
mail($destinatario,$asuntoweb,$contenido, $headers);
echo json_encode('todoOK');
?>