<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();


if(isset($_POST['id'])){
    $id = $_POST['id'];
    try {
        $query = "SELECT nombre  FROM banners WHERE id = ? AND eliminado = 0";
        $stmt = $dbh->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['success' => $result]);
    } catch (PDOException $e) {
        echo json_encode(['failed' => $e->getMessage()]);
    }
} else {
    echo json_encode(['failed' => 'No se recibió el id']);
}