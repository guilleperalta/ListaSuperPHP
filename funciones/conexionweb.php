<?php
const HOST = 'localhost';
const USER = 'u326062959_listasuper';
const PASS = 'listasuper2020';
const DATABASE = 'u326062959_listasuper';

$conn = new mysqli(HOST,USER,PASS,DATABASE);

if($conn->connect_error) {
	echo $error -> $conn->connect_error;
}
?>