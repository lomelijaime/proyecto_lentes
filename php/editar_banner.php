<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo actualizará un administrador en la BD.

try {
    $nombre = $_POST['nombre'];

    $inserted_data = [$nombre];

    $valida_archivo = $_FILES['foto']['error'];
    if ($valida_archivo == 0 && $valida_archivo !== null) {
        $nombre_archivo = $_FILES['foto']['name'];
        $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
        $nombre_archivo = pathinfo($nombre_archivo, PATHINFO_FILENAME);
        $ubicacion_temporal = $_FILES['foto']['tmp_name'];
        // Guardar archivo en el servidor
        $directorio_destino = '../img/banners/';
        $add_archivo = ', archivo = ?';
        $nombre_archivo_encriptado = md5($nombre_archivo) . '.' . $extension;
        $ubicacion_destino = $directorio_destino . $nombre_archivo_encriptado;
        move_uploaded_file($ubicacion_temporal, $ubicacion_destino);
        $inserted_data[] = $nombre_archivo_encriptado;
    } else $add_archivo = '';

    $id = $_POST['id'];
    $inserted_data[] = $id;

    $query = "UPDATE banners SET nombre = ? $add_archivo WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute($inserted_data);
    echo json_encode(['success' => 'Banner actualizado correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
