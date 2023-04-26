<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo insertará un nuevo administrador en la B1.

try {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $password = $_POST['password'];
    $password = md5($password);

    $nombre_archivo = $_FILES['foto']['name'];
    $ubicacion_temporal = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];
    $nombre_archivo_encriptado = md5($nombre_archivo);

    // Guardar archivo en el servidor
    $directorio_destino = '../img/administradores/';
    $ubicacion_destino = $directorio_destino . $nombre_archivo;
    move_uploaded_file($ubicacion_temporal, $ubicacion_destino);

    $query = "INSERT INTO administradores (nombre, apellidos, correo, rol, pass, archivo, archivo_n) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$nombre, $apellidos, $correo, $rol, $password, $nombre_archivo, $nombre_archivo_encriptado]);
    echo json_encode(['success' => 'Administrador agregado correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
