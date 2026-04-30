<?php
include 'conexion.php';

$action = $_GET['action'] ?? '';

switch ($action) {

    case 'listar':
        $result = $conn->query("SELECT * FROM envios ORDER BY id DESC");
        $envios = [];

        while ($row = $result->fetch_assoc()) {
            $envios[] = $row;
        }

        echo json_encode($envios);
        break;

    case 'crear':
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $destino = $_POST['destino'];

        $stmt = $conn->prepare("INSERT INTO envios (codigo, descripcion, destino) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $codigo, $descripcion, $destino);
        echo $stmt->execute();
        break;

    case 'editar':
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $destino = $_POST['destino'];

        $stmt = $conn->prepare("UPDATE envios SET codigo=?, descripcion=?, destino=? WHERE id=?");
        $stmt->bind_param("sssi", $codigo, $descripcion, $destino, $id);
        echo $stmt->execute();
        break;

    case 'eliminar':
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM envios WHERE id=?");
        $stmt->bind_param("i", $id);
        echo $stmt->execute();
        break;
}
?>