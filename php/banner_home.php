<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

try {
    $query = "SELECT nombre, archivo FROM banners WHERE status = 1 AND eliminado = 0 ORDER BY RAND() LIMIT 1";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(['success' => $result]);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
