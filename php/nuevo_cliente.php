<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo insertará un nuevo administrador en la B1.

try {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $password = md5($password);


    $query = "INSERT INTO clientes (nombre, apellidos, correo, pass) VALUES (?, ?, ?, ?)";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$nombre, $apellidos, $correo, $password]);
    echo json_encode(['success' => 'Su Cuenta fue creada correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
