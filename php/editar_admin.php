<?php
require_once 'conection.php';
$cn = new conectar();
$dbh = $cn->getDb();

//Este archivo actualizará un administrador en la BD.

try {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    $inserted_data = [$nombre, $apellidos, $correo, $rol];
    if (isset($_POST['password']) && $_POST['password'] != '') {
        $password = $_POST['password'];
        $password = md5($password);
        $add_pass = ', pass = ?';
        $inserted_data[] = $password;
    } else
        $add_pass = '';
    $valida_archivo = $_FILES['foto']['error'];
    if ($valida_archivo == 0 && $valida_archivo !== null) {
        $nombre_archivo = $_FILES['foto']['name'];
        $ubicacion_temporal = $_FILES['foto']['tmp_name'];
        // Guardar archivo en el servidor
        $directorio_destino = '../img/administradores/';
        $ubicacion_destino = $directorio_destino . $nombre_archivo;
        move_uploaded_file($ubicacion_temporal, $ubicacion_destino);
        $add_archivo = ', archivo = ?, archivo_n = ?';
        $inserted_data[] = $nombre_archivo;
        $nombre_archivo_encriptado = md5($nombre_archivo);
        $inserted_data[] = $nombre_archivo_encriptado;
    } else $add_archivo = '';

    $id = $_POST['id'];
    $inserted_data[] = $id;

    $query = "UPDATE administradores SET nombre = ?, apellidos = ?, correo = ?, rol = ? $add_pass $add_archivo WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute($inserted_data);
    echo json_encode(['success' => 'Administrador actualizado correctamente']);
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
