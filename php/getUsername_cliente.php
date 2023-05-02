<?php
session_start();
if (isset($_SESSION['nombre_cliente'])) {
    echo json_encode(['success' => $_SESSION['nombre_cliente']]);
} else {
    echo json_encode(['failed' => 'No hay sesión iniciada']);
}
