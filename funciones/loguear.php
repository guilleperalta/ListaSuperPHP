<?php
session_start();
require_once ('conexion.php');
//Tomamos los valores del POST
$user = $_POST['nombre'];
$pass = $_POST['pass'];
 //Validacion user
$user = trim($user);
$user = htmlspecialchars($user);
$user = stripslashes($user);
//$user = filter_var($user, FILTER_SANITIZE_STRING);
//Validacion pass
$pass = trim($pass);
$pass = htmlspecialchars($pass);
$pass = stripslashes($pass);
//$pass = filter_var($pass, FILTER_SANITIZE_STRING);

//Creamos las cookies
if ($_POST['cookie'] == 'true'){
	$mes = 60 * 60 * 24 * 30 + time();
	setcookie("usuario", $user, $mes, "/");
};

try {
	$sql = "SELECT * FROM usuarios WHERE user = '$user' AND pass = '$pass'";
	$result = $conn->query($sql);
	} catch (Exception $e) {
	$error = $e->getMessage();
	}

	if (mysqli_num_rows($result) !=0){
		$_SESSION['nombre'] = $user;
		$respuesta = "OK";
        echo json_encode($respuesta);
	}else{
		$respuesta = "ERROR";
        echo json_encode($respuesta);
	}
?>