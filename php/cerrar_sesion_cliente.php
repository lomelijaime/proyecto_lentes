<?php
session_start();
session_destroy();
$_SESSION['id_cliente'] = null;
$_SESSION['nombre_cliente'] = null;
$_SESSION['apellidos_cliente'] = null;
$_SESSION['correo_cliente'] = null;
header("Location: ../home.php");
