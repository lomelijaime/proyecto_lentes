<?php
//Envia correo
$destino = "lomelijaime01@gmail.com";
$nombre = $_POST["name"];
$correo = $_POST["email"];
$comentarios = $_POST["comments"];
$contenido = "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nComentarios: " . $comentarios;
mail($destino, "Contacto", $contenido);
header("Location: ../contacto.php");
?>