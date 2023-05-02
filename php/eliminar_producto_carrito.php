<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

try {
    $id = $_POST['id'];
    $query = "DELETE FROM pedidos_productos WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id]);
    echo json_encode(['success' => 'Producto eliminado correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
