<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "tropical_trendz";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>