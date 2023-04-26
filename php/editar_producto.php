<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo actualizará un administrador en la BD.

try {
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];
    $costo = $_POST['costo'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];

    $inserted_data = [$nombre, $codigo, $costo, $descripcion, $stock];
    $valida_archivo = $_FILES['foto']['error'];
    if ($valida_archivo == 0 && $valida_archivo !== null) {
        $nombre_archivo = $_FILES['foto']['name'];
        $ubicacion_temporal = $_FILES['foto']['tmp_name'];
        // Guardar archivo en el servidor
        $directorio_destino = '../img/productos/';
        $add_archivo = ', archivo = ?, archivo_n = ?';
        $inserted_data[] = $nombre_archivo;
        $nombre_archivo_encriptado = md5($nombre_archivo);
        $inserted_data[] = $nombre_archivo_encriptado;
        $ubicacion_destino = $directorio_destino . $nombre_archivo;
        move_uploaded_file($ubicacion_temporal, $ubicacion_destino);
    } else $add_archivo = '';

    $id = $_POST['id'];
    $inserted_data[] = $id;

    $query = "UPDATE productos SET nombre = ?, codigo = ?, costo = ?, descripcion = ?, stock = ? $add_archivo WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute($inserted_data);
    echo json_encode(['success' => 'Producto actualizado correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
