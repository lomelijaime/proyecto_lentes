<?php
require_once 'conection.php';
session_start();
$cn = new conectar();
$dbh = $cn->getDb();

//Genera un pedido con estatus abierto si no lo existe ya
if (!isset($_SESSION['id_cliente'])) {
    echo json_encode(['failed' => 'Sesion no iniciada']);
    exit;
}
$id = $_POST['id'];
$cantidad = $_POST['cantidad'];
$id_cliente = $_SESSION['id_cliente'];
try {
    $query = "SELECT id FROM pedidos WHERE id_cliente = ? AND status = 0";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id_cliente]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $id_pedido = $result['id'];
    } else {
        $query = "INSERT INTO pedidos (id_cliente, status) VALUES (?, 0)";
        $stmt = $dbh->prepare($query);
        $stmt->execute([$id_cliente]);
        $id_pedido = $dbh->lastInsertId();
    }
    // Revisa el producto, para ver si la cantidad es menor al stock disponible, de ser así se agrega al carrito con un subtotal
    $query = "SELECT stock, costo FROM productos WHERE id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $stock = $result['stock'];
        $costo = $result['costo'];
        if ($cantidad <= $stock) {
            $subtotal = $cantidad * $costo;
            $query = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) VALUES (?, ?, ?, ?)";
            $stmt = $dbh->prepare($query);
            $stmt->execute([$id_pedido, $id, $cantidad, $subtotal]);
            echo json_encode(['success' => 'Producto agregado al carrito']);
        } else {
            echo json_encode(['failed' => 'No hay suficiente stock']);
        }
    } else {
        echo json_encode(['failed' => 'No se encontró el producto']);
    }
} catch (PDOException $e) {
    echo json_encode(['failed' => $e->getMessage()]);
}
