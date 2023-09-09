<?php
require_once ('conexion.php');
session_start();

try {
$id = $_POST['id'];
$precio = $_POST['precio'];
$sql = "UPDATE listasuper SET preciounitario = '$precio' WHERE id='$id'";
$editarcantidad = $conn->query($sql);
} catch (Exception $e) {
  $error = $e->getMessage();
}                

echo json_encode($datos);
$conn->close();
?>
