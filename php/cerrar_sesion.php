<?php
session_start();
session_destroy();
$_SESSION['id'] = null;
$_SESSION['nombre'] = null;
$_SESSION['apellidos'] = null;
$_SESSION['correo'] = null;
$_SESSION['rol'] = null;
header("Location: ../index");
