<?php
session_start();
require_once ('conexion.php');
//Tomamos los valores del POST
$user = $_POST['nombre'];
$pass = $_POST['pass'];
//$user = 'algo';
//$pass = 'algo';
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

//echo $user;
//echo $pass;
//die();
//Inyectamos los datos en la base de datos
try {
    $sql = "SELECT * FROM usuarios WHERE user= '$user'";
    $resultado = $conn->query($sql);
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
    if ($resultado->num_rows == 0) {
      try {
          $sql = "INSERT INTO usuarios (user, pass) VALUES ('$user','$pass')";
          $resultado = $conn->query($sql);
          } catch (Exception $e) {
            $error = $e->getMessage();
          }
          $respuesta = "ok";
          echo json_encode($respuesta);
    }else{
      $respuesta = "error";
      echo json_encode($respuesta);
    }

$conn->close();
?>

