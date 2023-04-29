<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo insertará un nuevo administrador en la B1.

try {
    $nombre = $_POST['nombre'];

    $nombre_archivo = $_FILES['foto']['name'];
    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
    $nombre_archivo = pathinfo($nombre_archivo, PATHINFO_FILENAME);
    $ubicacion_temporal = $_FILES['foto']['tmp_name'];
    // $error = $_FILES['foto']['error'];
    $nombre_archivo_encriptado = md5($nombre_archivo) . '.' . $extension;

    // Guardar archivo en el servidor
    $directorio_destino = '../img/banners/';
    $ubicacion_destino = $directorio_destino . $nombre_archivo_encriptado;
    move_uploaded_file($ubicacion_temporal, $ubicacion_destino);

    $query = "INSERT INTO banners (nombre, archivo) VALUES (?, ?)";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$nombre, $nombre_archivo_encriptado]);
    echo json_encode(['success' => 'Banner agregado correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
