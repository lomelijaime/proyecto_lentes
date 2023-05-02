<?php
session_start();
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

try {
    $id_cliente = $_SESSION['id_cliente'];
    $query = "SELECT id FROM pedidos WHERE id_cliente = ? AND status = 0";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id_cliente]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];

    $query = "UPDATE pedidos SET status = 1 WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id]);
    echo json_encode(['success' => 'Finalizado']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
