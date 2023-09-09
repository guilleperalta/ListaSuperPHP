<?php
const HOST = 'localhost';
const USER = 'rvygnhwx_listasuper';
const PASS = 'listasuper2020';
const DATABASE = 'rvygnhwx_listasuper';
$conn =  mysqli_connect(HOST,USER,PASS,DATABASE);

echo $conn->ping();
echo $conn->query("SELECT * FROM usuarios");
// echo $result;
// $sql = "SELECT * FROM usuarios";
// $resultado = $conn->query($sql);
// echo $resultado;

// $conn->close();
?>
