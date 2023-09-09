<?php
require_once ('conexion.php');
session_start();

try {
  $user = $_POST['usuario'];
  $sql = "DELETE FROM listasuper WHERE user='$user' AND comprado='' ";
  $borrarsobrante = $conn->query($sql);
} catch (Exception $e) {
  $error = $e->getMessage();
}

echo json_encode($datos);
$conn->close();
?>
