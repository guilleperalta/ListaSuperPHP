<?php
require_once ('conexion.php');
session_start();

try {
$id = $_POST['id'];
$cantidad = $_POST['cantidad'];
$sql = "UPDATE listasuper SET cantidad = '$cantidad' WHERE id='$id'";
$editarcantidad = $conn->query($sql);
} catch (Exception $e) {
  $error = $e->getMessage();
}                

echo json_encode($datos);
$conn->close();
?>
