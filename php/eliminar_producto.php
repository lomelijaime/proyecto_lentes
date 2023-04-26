<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo establecerá el valor de eliminado a 1 en la B1 para el administrador con el id que se le pase.
try {
    $id = $_POST['id'];
    $query = "UPDATE productos SET eliminado = 1 WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id]);
    echo json_encode(['success' => 'Producto eliminado correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
