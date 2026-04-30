<?php
$host = "mysql-trainee115.alwaysdata.net";
$user = "trainee115";
$password = "clase1234";
$db = "trainee115_gestionenvios";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>