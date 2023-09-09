<?php
require_once ('conexion.php');
session_start();

try {
  $id = $_POST['id'];
  $sql = "DELETE FROM listasuper WHERE id='$id'";
  $eliminar = $conn->query($sql);
} catch (Exception $e) {
  $error = $e->getMessage();
}

echo json_encode($datos);
$conn->close();
?>
