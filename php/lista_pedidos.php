<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo regresará un json con los datos de los pedidos cerrados
try {
    $query = "SELECT id, fecha, id_cliente FROM pedidos WHERE status = 1 ORDER BY fecha DESC";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => $result]);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
