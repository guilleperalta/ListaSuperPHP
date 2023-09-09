<?php
require_once ('conexion.php');
session_start();

try {
$id = $_POST['id'];
$producto = $_POST['producto'];
$sql = "UPDATE listasuper SET nombre = '$producto' WHERE id='$id'";
$editarproducto = $conn->query($sql);
} catch (Exception $e) {
  $error = $e->getMessage();
}

echo json_encode($datos);
$conn->close();
?>
