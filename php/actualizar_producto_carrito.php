<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

try {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['costo'];
    $precio = $precio * $cantidad;
    $query = "UPDATE pedidos_productos SET cantidad = ?, precio = ? WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$cantidad, $precio, $id]);
    echo json_encode(['success' => 'Producto actualizado correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
