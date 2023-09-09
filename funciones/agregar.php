<?php
require_once ('conexion.php');
session_start();
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
if ($cantidad == ''){
    $cantidad = 1;
}
$accion = $_POST['accion'];
$user = $_SESSION['nombre'];
//Ingresamos el producto a la tabla
try {
    $sql = "INSERT INTO listasuper (nombre, cantidad, preciounitario, user, comprado) VALUES ('$producto','$cantidad','','$user', '')";
    $resultado = $conn->query($sql);
} catch (Exception $e) {
    $error = $e->getMessage();
}
//Averiguamos el ultimo id Ingresado
$last_id = mysqli_insert_id($conn);
//Devolvemos los datos del ultimo ingreso
try {
    $sql = "SELECT * FROM listasuper WHERE id= '$last_id'";
    $ultimoingreso = $conn->query($sql);
} catch (Exception $e) {
    $error = $e->getMessage();
}
foreach ($ultimoingreso as $key) {
    $prod = $key['nombre'];
    $cant = $key['cantidad'];
}
$datosok = array(
    "idok" => $last_id,
    "prodok" => $prod,
    "cantok" => $cant,
);

echo json_encode($datosok);
$conn->close();
?>
