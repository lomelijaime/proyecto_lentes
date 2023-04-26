<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Login

try {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $password = md5($password);
    $query = "SELECT * FROM administradores WHERE correo = ? AND pass = ? AND eliminado = 0";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$correo, $password]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        session_start();
        $_SESSION['id'] = $result['id'];
        $_SESSION['nombre'] = $result['nombre'];
        $_SESSION['apellidos'] = $result['apellidos'];
        $_SESSION['correo'] = $result['correo'];
        $_SESSION['rol'] = $result['rol'];
        echo json_encode(['success' => 'Bienvenido']);
    } else {
        echo json_encode(['success' => 'Incorrecto']);
    }
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
