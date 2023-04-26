<?php
session_start();
if (isset($_SESSION['nombre'])) {
    echo json_encode(['success' => $_SESSION['nombre']]);
} else {
    echo json_encode(['failed' => 'No hay sesión iniciada']);
}
