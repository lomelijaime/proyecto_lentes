<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo regresará un json con los datos del producto solicitados

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    try {
        $query = "SELECT nombre, codigo, descripcion, costo, stock, archivo, status FROM productos WHERE id = ? AND eliminado = 0";
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
