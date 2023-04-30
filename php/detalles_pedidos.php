<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo regresará un json con los datos de los pedidos cerrados
$id = $_POST['id'];
try {
    $query = "SELECT prod.id, prod.nombre, prod.codigo, ped_prod.cantidad, ped_prod.precio FROM pedidos_productos AS ped_prod INNER JOIN productos AS prod ON ped_prod.id_producto = prod.id WHERE ped_prod.id_pedido = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => $result]);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
