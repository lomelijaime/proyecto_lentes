<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

try {
    $query = "SELECT id, nombre, costo, archivo, stock  FROM productos WHERE status = 1 AND eliminado = 0 ORDER BY RAND() LIMIT 3";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => $result]);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
