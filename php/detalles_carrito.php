<?php
session_start();
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo regresará un json con los datos de los pedidos cerrados
$id_cliente = $_SESSION['id_cliente'];
try {
    //Obtener el id del pedido
    $query = "SELECT id FROM pedidos WHERE id_cliente = ? AND status = 0";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id_cliente]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];

    $query = "SELECT ped_prod.id, prod.nombre, prod.codigo, prod.stock, prod.costo, ped_prod.cantidad, ped_prod.precio FROM pedidos_productos AS ped_prod INNER JOIN productos AS prod ON ped_prod.id_producto = prod.id WHERE ped_prod.id_pedido = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => $result]);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
