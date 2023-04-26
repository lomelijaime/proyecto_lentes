<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo recuperará los datos de un administrador en la BD.

if(isset($_POST['id'])){
    $id = $_POST['id'];
    try {
        $query = "SELECT nombre, apellidos, correo, rol FROM administradores WHERE id = ? AND eliminado = 0";
        $stmt = $dbh->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['success' => $result]);
    } catch (PDOException $e) {
        echo json_encode(['failed' => $e->getMessage()]);
    }
} else {
    echo json_encode(['failed' => 'No se recibió el id']);
}