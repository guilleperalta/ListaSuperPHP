<?php
const HOST = 'localhost';
const USER = 'c1452228_guillep';
const PASS = 'wibaRAdo33';
const DATABASE = 'c1452228_guillep';

$conn = new mysqli(HOST,USER,PASS,DATABASE);

if($conn->connect_error) {
	echo $error -> $conn->connect_error;
}
?>