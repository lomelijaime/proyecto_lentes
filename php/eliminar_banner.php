<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

try {
    $id = $_POST['id'];
    $query = "UPDATE banners SET eliminado = 1 WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id]);
    echo json_encode(['success' => 'Banner eliminado correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
