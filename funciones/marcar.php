<?php
require_once ('conexion.php');
session_start();

$id = $_POST['id'];
$sql = "SELECT comprado FROM listasuper WHERE id='$id'";
$consultarcomprado = $conn->query($sql);
while ($a = $consultarcomprado->fetch_assoc()) {
    if ($a['comprado'] == ''){
      try {
      $sql = "UPDATE listasuper SET comprado = 'activo' WHERE id='$id'";
      $activar = $conn->query($sql);
      } catch (Exception $e) {
        $error = $e->getMessage();
      }    
  }else{
      $id = $_POST['id'];
      try {
      $sql = "UPDATE listasuper SET comprado = '' WHERE id='$id'";
      $desactivar = $conn->query($sql);
      } catch (Exception $e) {
        $error = $e->getMessage();
      }
  }
}

echo json_encode($datos);
$conn->close();
?>
