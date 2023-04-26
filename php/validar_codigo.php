<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo validará si el codigo ya existe en la BD.

try {
    $codigo = $_POST['codigo'];
    if (isset($_POST['id'])) $id = $_POST['id'];
    else $id = null;
    if ($id != null) {
        $query = "SELECT codigo FROM productos WHERE codigo = ? AND status = 1 AND eliminado = 0 AND id != ?";
        $stmt = $dbh->prepare($query);
        $stmt->execute([$codigo, $id]);
    } else {
        $query = "SELECT codigo FROM productos WHERE codigo = ? AND status = 1 AND eliminado = 0";
        $stmt = $dbh->prepare($query);
        $stmt->execute([$codigo]);
    }
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(['success' => 'repetido']);
    } else {
        echo json_encode(['success' => 'El codigo no existe']);
    }
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
