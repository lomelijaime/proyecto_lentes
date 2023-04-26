<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo validará si el correo ya existe en la BD.

try {
    $correo = $_POST['correo'];
    if (isset($_POST['id'])) $id = $_POST['id'];
    else $id = null;
    if ($id != null) {
        $query = "SELECT correo FROM administradores WHERE correo = ? AND id != ?";
        $stmt = $dbh->prepare($query);
        $stmt->execute([$correo, $id]);
    } else {
        $query = "SELECT correo FROM administradores WHERE correo = ?";
        $stmt = $dbh->prepare($query);
        $stmt->execute([$correo]);
    }
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(['success' => 'repetido']);
    } else {
        echo json_encode(['success' => 'El correo no existe']);
    }
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
