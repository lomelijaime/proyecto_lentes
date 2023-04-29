<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo regresará un json con los datos de los banners
try {
    $query = "SELECT id, nombre, status FROM banners WHERE eliminado = 0";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => $result]);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
