<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="img/favicon_io_shop/favicon.ico" type="image/x-icon">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'layout/navbar_shop.php'; ?>

    <div class="container">
        <h1>Listado de productos en el pedido</h1>
        <div class="table-responsive">
            <table id="t_pedido" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center">
                <span class="fw-bold me-2">Total:</span>
                <span id="total_pedido" class="fs-4"></span>
            </div>
        </div>
        <button id="finalizar_pedido" class="btn btn-success">Finalizar pedido</button>
        <hr>
        <a href="carrito" class="btn btn-primary" style="float:right">Volver a editar carrito</a>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="src/js/carrito_2.js"></script>
    <script src="src/js/getUsername_cliente.js"></script>
</body>

</html>